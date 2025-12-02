<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artisan;
use App\Models\ServiceCategory;
use App\Models\ServiceRequest;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        
        if (!$query) {
            return view('search.results', [
                'artisans' => [],
                'categories' => [],
                'requests' => [],
                'query' => ''
            ]);
        }
        
        // Recherche dans les artisans
        $artisans = Artisan::where('name', 'LIKE', "%{$query}%")
            ->orWhere('skills', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();
        
        // Recherche dans les catégories de service
        $categories = ServiceCategory::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();
        
        // Recherche dans les demandes de service
        $requests = ServiceRequest::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();
        
        return view('search.results', compact('artisans', 'categories', 'requests', 'query'));
    }
}