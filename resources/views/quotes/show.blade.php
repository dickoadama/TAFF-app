@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Détails du devis</h1>
        <div>
            <a href="{{ route('quotes.edit', $quote) }}" class="btn-accent mr-2">
                <i class="fas fa-edit mr-2"></i>Modifier
            </a>
            <a href="{{ route('quotes.index') }}" class="btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="card mb-6 quote-container">
                <div class="card-header quote-header">
                    <h2 class="text-xl font-semibold quote-title">Informations du devis</h2>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 quote-details">
                        <div class="detail-item">
                            <span class="detail-label">ID:</span>
                            <span class="quote-number">#{{ $quote->id }}</span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="detail-label">Statut:</span>
                            <span class="quote-status px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($quote->status == 'pending') bg-yellow-100 text-yellow-800
                                @elseif($quote->status == 'accepted') bg-blue-100 text-blue-800
                                @elseif($quote->status == 'rejected') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ ucfirst($quote->status) }}
                            </span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="detail-label">Montant:</span>
                            <span class="quote-amount text-xl font-bold text-primary">{{ number_format($quote->amount, 2, ',', ' ') }} €</span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="detail-label">Valide jusqu'au:</span>
                            <span class="quote-valid-until">
                                @if($quote->valid_until)
                                    {{ $quote->valid_until->format('d/m/Y') }}
                                @else
                                    <span class="text-gray-500">N/A</span>
                                @endif
                            </span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="detail-label">Demande de service:</span>
                            <span>
                                @if($quote->serviceRequest)
                                    <a href="{{ route('service-requests.show', $quote->serviceRequest) }}" class="text-primary hover:underline">
                                        {{ $quote->serviceRequest->title }}
                                    </a>
                                @else
                                    <span class="text-gray-500">Non disponible</span>
                                @endif
                            </span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="detail-label">Artisan:</span>
                            <span>
                                @if($quote->artisan)
                                    <a href="{{ route('artisans.show', $quote->artisan) }}" class="text-primary hover:underline">
                                        {{ $quote->artisan->name }}
                                    </a>
                                @else
                                    <span class="text-gray-500">Non disponible</span>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            @if($quote->description)
            <div class="card quote-description">
                <div class="card-header">
                    <h2 class="text-xl font-semibold description-title">Description</h2>
                </div>
                <div class="card-body">
                    <p class="whitespace-pre-wrap">{{ $quote->description }}</p>
                </div>
            </div>
            @endif
        </div>
        
        <div>
            <div class="card mb-6">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Actions</h2>
                </div>
                <div class="card-body">
                    <div class="space-y-3">
                        <button class="btn-primary w-full">
                            <i class="fas fa-download mr-2"></i>Télécharger le devis
                        </button>
                        <button onclick="window.print()" class="btn-secondary w-full">
                            <i class="fas fa-print mr-2"></i>Imprimer le devis
                        </button>
                        <form action="{{ route('quotes.destroy', $quote) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger w-full" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce devis ?')">
                                <i class="fas fa-trash mr-2"></i>Supprimer le devis
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Historique</h2>
                </div>
                <div class="card-body">
                    <div class="text-sm text-gray-500">
                        <p>Créé le: {{ $quote->created_at->format('d/m/Y H:i') }}</p>
                        <p>Modifié le: {{ $quote->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styles pour l'impression -->
<style>
@media print {
    /* Masquer les éléments inutiles lors de l'impression */
    .no-print {
        display: none !important;
    }
    
    /* Ajuster la mise en page pour l'impression */
    body {
        background: white;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        font-size: 12pt;
        color: black;
    }
    
    /* Style pour le devis */
    .quote-container {
        width: 100%;
        max-width: none;
        margin: 0;
        padding: 0;
        box-shadow: none;
        border: none;
    }
    
    /* En-tête du devis */
    .quote-header {
        border-bottom: 2pt solid #333;
        padding-bottom: 10pt;
        margin-bottom: 20pt;
    }
    
    .quote-title {
        font-size: 20pt;
        font-weight: bold;
        margin-bottom: 10pt;
    }
    
    .quote-number {
        font-size: 12pt;
        margin-bottom: 5pt;
    }
    
    .quote-valid-until {
        font-size: 10pt;
        margin-bottom: 5pt;
    }
    
    .quote-status {
        display: none; /* Le statut n'est pas nécessaire sur l'impression */
    }
    
    /* Informations client */
    .client-info {
        margin-bottom: 20pt;
    }
    
    .client-title {
        font-size: 14pt;
        font-weight: bold;
        margin-bottom: 10pt;
        border-bottom: 1pt solid #333;
        padding-bottom: 5pt;
    }
    
    /* Informations du devis */
    .quote-details {
        margin-bottom: 20pt;
    }
    
    .detail-item {
        margin-bottom: 8pt;
    }
    
    .detail-label {
        font-weight: bold;
        display: inline-block;
        width: 120pt;
    }
    
    /* Description */
    .quote-description {
        margin-bottom: 20pt;
        padding: 10pt;
        border: 1pt solid #ccc;
    }
    
    .description-title {
        font-size: 14pt;
        font-weight: bold;
        margin-bottom: 10pt;
        border-bottom: 1pt solid #333;
        padding-bottom: 5pt;
    }
    
    /* Montant */
    .quote-amount {
        font-size: 16pt;
        font-weight: bold;
        margin: 20pt 0;
        text-align: right;
    }
    
    /* Mentions légales */
    .legal-mentions {
        font-size: 9pt;
        margin-top: 30pt;
        padding-top: 10pt;
        border-top: 1pt solid #333;
    }
    
    /* Pied de page */
    .quote-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        text-align: center;
        font-size: 9pt;
        padding: 10pt 0;
        border-top: 1pt solid #333;
    }
    
    /* Pagination */
    @page {
        margin: 2cm;
    }
    
    /* S'assurer que les couleurs sont imprimées */
    * {
        -webkit-print-color-adjust: exact !important;
        color-adjust: exact !important;
    }
}
</style>
@endsection