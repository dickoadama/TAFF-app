<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\ServiceRequest;
use App\Models\Artisan;
use App\Models\Product;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::with(['serviceRequest', 'artisan'])->latest()->paginate(10);
        return view('quotes.index', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceRequests = ServiceRequest::whereDoesntHave('quotes')->get();
        $artisans = Artisan::all();
        $products = Product::orderBy('name')->get();
        return view('quotes.create', compact('serviceRequests', 'artisans', 'products'));
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
            'service_request_id' => 'required|exists:service_requests,id',
            'artisan_id' => 'required|exists:artisans,id',
            'product_id' => 'nullable|exists:products,id',
            'price_ht' => 'nullable|numeric|min:0',
            'tax_rate' => 'nullable|numeric|min:0|max:100',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'valid_until' => 'nullable|date|after:today',
        ]);

        $quote = Quote::create($request->all());

        return redirect()->route('quotes.index')->with('success', 'Devis créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quote = Quote::with(['serviceRequest', 'artisan'])->findOrFail($id);
        return view('quotes.show', compact('quote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quote = Quote::findOrFail($id);
        $serviceRequests = ServiceRequest::all();
        $artisans = Artisan::all();
        $products = Product::orderBy('name')->get();
        return view('quotes.edit', compact('quote', 'serviceRequests', 'artisans', 'products'));
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
            'service_request_id' => 'required|exists:service_requests,id',
            'artisan_id' => 'required|exists:artisans,id',
            'product_id' => 'nullable|exists:products,id',
            'price_ht' => 'nullable|numeric|min:0',
            'tax_rate' => 'nullable|numeric|min:0|max:100',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'valid_until' => 'nullable|date|after:today',
            'status' => 'required|in:pending,accepted,rejected,expired',
        ]);

        $quote = Quote::findOrFail($id);
        $quote->update($request->all());

        return redirect()->route('quotes.index')->with('success', 'Devis mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();
        
        return redirect()->route('quotes.index')->with('success', 'Devis supprimé avec succès.');
    }
}