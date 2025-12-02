<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artisan;
use App\Models\ServiceCategory;
use App\Models\ServiceRequest;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer des données pour la page d'accueil
        $featuredArtisans = Artisan::where('available', true)
            ->orderBy('rating', 'desc')
            ->orderBy('id', 'asc') // Ajout d'un tri secondaire pour éviter les doublons
            ->limit(3)
            ->get();
            
        $categories = ServiceCategory::withCount('artisans')
            ->orderBy('artisans_count', 'desc')
            ->limit(4)
            ->get();
            
        $recentRequests = ServiceRequest::with(['user', 'serviceCategory'])
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('home', compact('featuredArtisans', 'categories', 'recentRequests'));
    }
    
    public function embellished()
    {
        return view('welcome');
    }
    
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        if (!$query) {
            return redirect()->route('home');
        }
        
        // Rechercher dans les artisans
        $artisans = Artisan::where('name', 'LIKE', "%{$query}%")
            ->orWhere('skills', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(10);
            
        // Rechercher dans les catégories de service
        $categories = ServiceCategory::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(10);
            
        // Rechercher dans les demandes de service
        $serviceRequests = ServiceRequest::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(10);
        
        return view('search.results', compact('artisans', 'categories', 'serviceRequests', 'query'));
    }
}