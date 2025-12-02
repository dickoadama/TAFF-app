<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name')->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_ht' => 'required|numeric|min:0',
            'tax_rate' => 'nullable|numeric|min:0|max:100'
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Marchandise ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_ht' => 'required|numeric|min:0',
            'tax_rate' => 'nullable|numeric|min:0|max:100'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Marchandise mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Marchandise supprimée avec succès.');
    }

    /**
     * Get product details for AJAX requests.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getProductDetails(Request $request)
    {
        $product = Product::find($request->id);
        
        if ($product) {
            return response()->json([
                'price_ht' => $product->price_ht,
                'tax_rate' => $product->tax_rate,
                'price_ttc' => $product->price_ht * (1 + $product->tax_rate / 100)
            ]);
        }
        
        return response()->json(['error' => 'Produit non trouvé'], 404);
    }
}
