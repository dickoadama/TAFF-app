<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use App\Models\ServiceCategory;
use App\Models\Artisan;
use App\Models\Quote;
use App\Models\Invoice;

class ServiceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceRequests = ServiceRequest::with(['user', 'artisan', 'serviceCategory'])->latest()->paginate(10);
        return view('service-requests.index', compact('serviceRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceCategories = ServiceCategory::all();
        $artisans = Artisan::all();
        return view('service-requests.create', compact('serviceCategories', 'artisans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'service_category_id' => 'required|exists:service_categories,id',
            'artisan_id' => 'nullable|exists:artisans,id',
            'description' => 'required|string',
            'address' => 'nullable|string',
            'preferred_date' => 'nullable|date',
        ]);

        $serviceRequest = ServiceRequest::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'service_category_id' => $request->service_category_id,
            'artisan_id' => $request->artisan_id,
            'description' => $request->description,
            'address' => $request->address,
            'preferred_date' => $request->preferred_date,
            'status' => 'pending',
        ]);

        return redirect()->route('service-requests.index')->with('success', 'Demande de service créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceRequest = ServiceRequest::with(['user', 'artisan', 'serviceCategory', 'quotes.artisan', 'quote', 'invoice'])->findOrFail($id);
        return view('service-requests.show', compact('serviceRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviceRequest = ServiceRequest::findOrFail($id);
        $serviceCategories = ServiceCategory::all();
        $artisans = Artisan::all();
        return view('service-requests.edit', compact('serviceRequest', 'serviceCategories', 'artisans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'service_category_id' => 'required|exists:service_categories,id',
            'artisan_id' => 'nullable|exists:artisans,id',
            'description' => 'required|string',
            'address' => 'nullable|string',
            'preferred_date' => 'nullable|date',
            'status' => 'required|in:pending,accepted,in_progress,completed,cancelled',
        ]);

        $serviceRequest = ServiceRequest::findOrFail($id);
        $serviceRequest->update($request->all());

        return redirect()->route('service-requests.index')->with('success', 'Demande de service mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serviceRequest = ServiceRequest::findOrFail($id);
        $serviceRequest->delete();
        
        return redirect()->route('service-requests.index')->with('success', 'Demande de service supprimée avec succès.');
    }

    /**
     * Select a quote for the service request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function selectQuote(Request $request, $id)
    {
        $serviceRequest = ServiceRequest::findOrFail($id);
        $quote = Quote::findOrFail($request->quote_id);

        // Vérifier que le devis appartient à cette demande de service
        if ($quote->service_request_id != $serviceRequest->id) {
            return redirect()->back()->with('error', 'Ce devis n\'appartient pas à cette demande de service.');
        }

        // Mettre à jour la demande de service avec le devis sélectionné
        $serviceRequest->update(['quote_id' => $quote->id]);

        return redirect()->back()->with('success', 'Devis sélectionné avec succès.');
    }

    /**
     * Generate an invoice from the selected quote.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function generateInvoice($id)
    {
        $serviceRequest = ServiceRequest::with('quote')->findOrFail($id);

        // Vérifier qu'un devis est sélectionné
        if (!$serviceRequest->quote) {
            return redirect()->back()->with('error', 'Aucun devis sélectionné pour cette demande de service.');
        }

        // Vérifier que le devis est accepté
        if ($serviceRequest->quote->status != 'accepted') {
            return redirect()->back()->with('error', 'Le devis doit être accepté pour générer une facture.');
        }

        // Vérifier qu'aucune facture n'existe déjà pour cette demande
        if ($serviceRequest->invoice_id) {
            return redirect()->back()->with('error', 'Une facture existe déjà pour cette demande de service.');
        }

        // Générer un numéro de facture unique
        $invoiceNumber = 'INV-' . date('Y') . '-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);

        // Créer la facture
        $invoice = Invoice::create([
            'quote_id' => $serviceRequest->quote_id,
            'user_id' => $serviceRequest->user_id,
            'artisan_id' => $serviceRequest->quote->artisan_id,
            'invoice_number' => $invoiceNumber,
            'amount' => $serviceRequest->quote->amount,
            'issued_date' => now(),
            'due_date' => now()->addDays(30),
            'status' => 'pending',
            'notes' => 'Facture générée automatiquement à partir du devis #' . $serviceRequest->quote->id,
        ]);

        // Mettre à jour la demande de service avec la facture
        $serviceRequest->update(['invoice_id' => $invoice->id]);

        return redirect()->back()->with('success', 'Facture générée avec succès.');
    }
}