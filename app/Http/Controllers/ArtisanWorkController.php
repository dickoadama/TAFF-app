<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artisan;
use App\Models\ArtisanWork;
use Illuminate\Support\Facades\Storage;

class ArtisanWorkController extends Controller
{
    /**
     * Affiche les réalisations d'un artisan
     */
    public function index(Artisan $artisan)
    {
        $works = $artisan->works()->latest()->paginate(6);
        return view('artisans.works.index', compact('artisan', 'works'));
    }

    /**
     * Affiche le formulaire de création d'une réalisation
     */
    public function create(Artisan $artisan)
    {
        return view('artisans.works.create', compact('artisan'));
    }

    /**
     * Enregistre une nouvelle réalisation
     */
    public function store(Request $request, Artisan $artisan)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'completion_date' => 'nullable|date',
            'client_name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Gérer le téléchargement de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('works', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        // Créer la réalisation
        $artisan->works()->create($validatedData);

        return redirect()->route('artisans.works.index', $artisan)
            ->with('success', 'Réalisation ajoutée avec succès.');
    }

    /**
     * Affiche le formulaire d'édition d'une réalisation
     */
    public function edit(Artisan $artisan, ArtisanWork $work)
    {
        return view('artisans.works.edit', compact('artisan', 'work'));
    }

    /**
     * Met à jour une réalisation
     */
    public function update(Request $request, Artisan $artisan, ArtisanWork $work)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'completion_date' => 'nullable|date',
            'client_name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Gérer le téléchargement de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($work->image_path) {
                Storage::disk('public')->delete($work->image_path);
            }
            
            $imagePath = $request->file('image')->store('works', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        // Mettre à jour la réalisation
        $work->update($validatedData);

        return redirect()->route('artisans.works.index', [$artisan])
            ->with('success', 'Réalisation mise à jour avec succès.');
    }

    /**
     * Supprime une réalisation
     */
    public function destroy(Artisan $artisan, ArtisanWork $work)
    {
        // Supprimer l'image si elle existe
        if ($work->image_path) {
            Storage::disk('public')->delete($work->image_path);
        }

        // Supprimer la réalisation
        $work->delete();

        return redirect()->route('artisans.works.index', $artisan)
            ->with('success', 'Réalisation supprimée avec succès.');
    }
}