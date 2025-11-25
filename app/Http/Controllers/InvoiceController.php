<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Quote;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with(['quote', 'user', 'artisan'])->latest()->paginate(10);
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quotes = Quote::whereDoesntHave('invoice')->get();
        return view('invoices.create', compact('quotes'));
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
            'quote_id' => 'required|exists:quotes,id',
            'invoice_number' => 'required|unique:invoices',
            'issued_date' => 'required|date',
            'due_date' => 'required|date|after:issued_date',
            'notes' => 'nullable|string',
        ]);

        $quote = Quote::findOrFail($request->quote_id);
        
        $invoice = Invoice::create([
            'quote_id' => $quote->id,
            'user_id' => $quote->serviceRequest->user_id,
            'artisan_id' => $quote->artisan_id,
            'invoice_number' => $request->invoice_number,
            'amount' => $quote->amount,
            'issued_date' => $request->issued_date,
            'due_date' => $request->due_date,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->route('invoices.index')->with('success', 'Facture créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::with(['quote', 'user', 'artisan'])->findOrFail($id);
        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $quotes = Quote::all();
        return view('invoices.edit', compact('invoice', 'quotes'));
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
            'quote_id' => 'required|exists:quotes,id',
            'invoice_number' => 'required|unique:invoices,invoice_number,'.$id,
            'issued_date' => 'required|date',
            'due_date' => 'required|date|after:issued_date',
            'status' => 'required|in:pending,paid,overdue,cancelled',
            'notes' => 'nullable|string',
        ]);

        $invoice = Invoice::findOrFail($id);
        $quote = Quote::findOrFail($request->quote_id);
        
        $invoice->update([
            'quote_id' => $quote->id,
            'user_id' => $quote->serviceRequest->user_id,
            'artisan_id' => $quote->artisan_id,
            'invoice_number' => $request->invoice_number,
            'amount' => $quote->amount,
            'issued_date' => $request->issued_date,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        return redirect()->route('invoices.index')->with('success', 'Facture mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        
        return redirect()->route('invoices.index')->with('success', 'Facture supprimée avec succès.');
    }
}