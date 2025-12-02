@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 animate__animated animate__fadeIn">
    <div class="mb-8 animate__animated animate__fadeInDown">
        <h1 class="text-4xl font-bold text-gray-800 animate__animated animate__pulse">Tableau de bord</h1>
        <p class="text-gray-600 animate__animated animate__fadeIn">Vue d'ensemble de votre activité sur TAFF</p>
    </div>

    <!-- Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="card animate__animated animate__fadeInUp">
            <div class="card-body">
                <div class="flex items-center">
                    <div class="rounded-full bg-green-100 p-4 mr-4 animate__animated animate__bounceIn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="animate__animated animate__fadeIn">
                        <p class="text-gray-500 text-sm">Devis</p>
                        <p class="text-3xl font-bold animate__animated animate__fadeIn">{{ $totalQuotes }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card animate__animated animate__fadeInUp animate__delay-0.2s">
            <div class="card-body">
                <div class="flex items-center">
                    <div class="rounded-full bg-yellow-100 p-4 mr-4 animate__animated animate__bounceIn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="animate__animated animate__fadeIn">
                        <p class="text-gray-500 text-sm">Factures</p>
                        <p class="text-3xl font-bold animate__animated animate__fadeIn">{{ $totalInvoices }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card animate__animated animate__fadeInUp animate__delay-0.4s">
            <div class="card-body">
                <div class="flex items-center">
                    <div class="rounded-full bg-blue-100 p-4 mr-4 animate__animated animate__bounceIn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <div class="animate__animated animate__fadeIn">
                        <p class="text-gray-500 text-sm">Achats</p>
                        <p class="text-3xl font-bold animate__animated animate__fadeIn">0</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card animate__animated animate__fadeInUp animate__delay-0.6s">
            <div class="card-body">
                <div class="flex items-center">
                    <div class="rounded-full bg-purple-100 p-4 mr-4 animate__animated animate__bounceIn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="animate__animated animate__fadeIn">
                        <p class="text-gray-500 text-sm">Artisans</p>
                        <p class="text-3xl font-bold animate__animated animate__fadeIn">{{ $totalArtisans }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphiques -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <div class="card animate__animated animate__fadeInUp animate__delay-0.8s">
            <div class="card-header">
                <h2 class="text-2xl font-semibold animate__animated animate__fadeIn">Activité récente</h2>
            </div>
            <div class="card-body">
                <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg animate__animated animate__fadeIn">
                    <div class="text-center">
                        <i class="fas fa-chart-line text-4xl text-gray-400 mb-4 animate__animated animate__bounceIn"></i>
                        <p class="text-gray-500 animate__animated animate__fadeIn">Graphique d'activité</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card animate__animated animate__fadeInUp animate__delay-1s">
            <div class="card-header">
                <h2 class="text-2xl font-semibold animate__animated animate__fadeIn">Performance</h2>
            </div>
            <div class="card-body">
                <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg animate__animated animate__fadeIn">
                    <div class="text-center">
                        <i class="fas fa-tachometer-alt text-4xl text-gray-400 mb-4 animate__animated animate__bounceIn"></i>
                        <p class="text-gray-500 animate__animated animate__fadeIn">Indicateurs de performance</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Devis récents -->
        <div class="card animate__animated animate__fadeInUp animate__delay-1.2s">
            <div class="card-header">
                <h2 class="text-2xl font-semibold animate__animated animate__fadeIn">Devis récents</h2>
            </div>
            <div class="card-body">
                @if($recentQuotes->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($recentQuotes as $quote)
                                <tr class="hover:bg-gray-50 transition-colors duration-200 animate__animated animate__fadeIn">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ number_format($quote->amount, 2, ',', ' ') }} €</div>
                                        <div class="text-sm text-gray-500">{{ $quote->artisan->name ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($quote->status == 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($quote->status == 'accepted') bg-blue-100 text-blue-800
                                            @elseif($quote->status == 'rejected') bg-red-100 text-red-800
                                            @else bg-gray-100 text-gray-800
                                            @endif animate__animated animate__fadeIn">
                                            {{ ucfirst($quote->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('quotes.show', $quote) }}" class="text-primary hover:text-secondary mr-3 animate__animated animate__fadeIn transform hover:scale-110">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('quotes.edit', $quote) }}" class="text-accent hover:text-amber-600 animate__animated animate__fadeIn transform hover:scale-110">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-500 text-center py-4 animate__animated animate__fadeIn">Aucun devis récent.</p>
                @endif
            </div>
        </div>

        <!-- Factures récentes -->
        <div class="card animate__animated animate__fadeInUp animate__delay-1.4s">
            <div class="card-header">
                <h2 class="text-2xl font-semibold animate__animated animate__fadeIn">Factures récentes</h2>
            </div>
            <div class="card-body">
                @if($recentInvoices->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numéro</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($recentInvoices as $invoice)
                                <tr class="hover:bg-gray-50 transition-colors duration-200 animate__animated animate__fadeIn">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $invoice->invoice_number }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ number_format($invoice->amount, 2, ',', ' ') }} €</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($invoice->status == 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($invoice->status == 'paid') bg-green-100 text-green-800
                                            @elseif($invoice->status == 'overdue') bg-red-100 text-red-800
                                            @else bg-gray-100 text-gray-800
                                            @endif animate__animated animate__fadeIn">
                                            {{ ucfirst($invoice->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('invoices.show', $invoice) }}" class="text-primary hover:text-secondary mr-3 animate__animated animate__fadeIn transform hover:scale-110">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('invoices.edit', $invoice) }}" class="text-accent hover:text-amber-600 animate__animated animate__fadeIn transform hover:scale-110">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-500 text-center py-4 animate__animated animate__fadeIn">Aucune facture récente.</p>
                @endif
            </div>
        </div>

        <!-- Achats récents -->
        <div class="card animate__animated animate__fadeInUp animate__delay-1.6s">
            <div class="card-header">
                <h2 class="text-2xl font-semibold animate__animated animate__fadeIn">Achats récents</h2>
            </div>
            <div class="card-body">
                <p class="text-gray-500 text-center py-4 animate__animated animate__fadeIn">Aucun achat récent.</p>
            </div>
        </div>

        <!-- Catégories de services populaires -->
        <div class="card animate__animated animate__fadeInUp animate__delay-1.8s">
            <div class="card-header">
                <h2 class="text-2xl font-semibold animate__animated animate__fadeIn">Catégories de services populaires</h2>
            </div>
            <div class="card-body">
                @if($serviceCategories->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Demandes</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($serviceCategories as $category)
                                <tr class="hover:bg-gray-50 transition-colors duration-200 animate__animated animate__fadeIn">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $category->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $category->service_requests_count }}</div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-500 text-center py-4 animate__animated animate__fadeIn">Aucune donnée disponible.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection