<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use App\Models\Quote;
use App\Models\Invoice;
use App\Models\Artisan;
use App\Models\ServiceCategory;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer les statistiques
        $totalServiceRequests = ServiceRequest::count();
        $totalQuotes = Quote::count();
        $totalInvoices = Invoice::count();
        $totalArtisans = Artisan::count();
        
        // Récupérer les éléments récents
        $recentServiceRequests = ServiceRequest::with(['user', 'artisan', 'serviceCategory'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
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
            'totalServiceRequests',
            'totalQuotes',
            'totalInvoices',
            'totalArtisans',
            'recentServiceRequests',
            'recentQuotes',
            'recentInvoices',
            'serviceCategories'
        ));
    }
}