<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Invoice;
use App\Models\Artisan;
use App\Models\ServiceCategory;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer les statistiques
        $totalQuotes = Quote::count();
        $totalInvoices = Invoice::count();
        $totalArtisans = Artisan::count();
        
        // Récupérer les éléments récents
        $recentQuotes = Quote::with(['serviceRequest', 'artisan'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        $recentInvoices = Invoice::with(['quote', 'user', 'artisan'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        // Récupérer les catégories de services
        $serviceCategories = ServiceCategory::withCount('serviceRequests')
            ->orderBy('service_requests_count', 'desc')
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalQuotes',
            'totalInvoices',
            'totalArtisans',
            'recentQuotes',
            'recentInvoices',
            'serviceCategories'
        ));
    }
}