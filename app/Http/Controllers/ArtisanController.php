<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artisan;
use App\Models\ServiceCategory;

class ArtisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artisans = Artisan::with('serviceCategory')->paginate(10);
        return view('artisans.index', compact('artisans'));
    }

    /**
     * Display a listing of featured artisans.
     *
     * @return \Illuminate\Http\Response
     */
    public function featured()
    {
        $featuredArtisans = Artisan::where('available', true)
            ->with('serviceCategory')
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get();
            
        return view('artisans.featured', compact('featuredArtisans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceCategories = ServiceCategory::all();
        return view('artisans.create', compact('serviceCategories'));
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
            'email' => 'required|email|unique:artisans',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'service_category_id' => 'required|exists:service_categories,id',
            'skills' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        Artisan::create($request->all());

        return redirect()->route('artisans.index')->with('success', 'Artisan ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Artisan $artisan)
    {
        $artisan->load(['serviceCategory', 'works']);
        return view('artisans.show', compact('artisan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Artisan $artisan)
    {
        $serviceCategories = ServiceCategory::all();
        return view('artisans.edit', compact('artisan', 'serviceCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artisan $artisan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:artisans,email,'.$artisan->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'service_category_id' => 'required|exists:service_categories,id',
            'skills' => 'nullable|string',
            'description' => 'nullable|string',
            'rating' => 'nullable|numeric|min:0|max:5',
            'review_count' => 'nullable|integer|min:0',
            'available' => 'nullable|boolean',
        ]);

        $artisan->update($request->all());

        return redirect()->route('artisans.index')->with('success', 'Artisan mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artisan $artisan)
    {
        $artisan->delete();
        return redirect()->route('artisans.index')->with('success', 'Artisan supprimé avec succès.');
    }
}