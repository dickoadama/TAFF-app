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
            <div class="card mb-6">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Informations du devis</h2>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">ID</label>
                            <p class="text-lg">#{{ $quote->id }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Statut</label>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($quote->status == 'pending') bg-yellow-100 text-yellow-800
                                @elseif($quote->status == 'accepted') bg-blue-100 text-blue-800
                                @elseif($quote->status == 'rejected') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ ucfirst($quote->status) }}
                            </span>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Montant</label>
                            <p class="text-xl font-bold text-primary">{{ number_format($quote->amount, 2, ',', ' ') }} €</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Valide jusqu'au</label>
                            <p>
                                @if($quote->valid_until)
                                    {{ $quote->valid_until->format('d/m/Y') }}
                                @else
                                    <span class="text-gray-500">N/A</span>
                                @endif
                            </p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Demande de service</label>
                            <p>
                                @if($quote->serviceRequest)
                                    <a href="{{ route('service-requests.show', $quote->serviceRequest) }}" class="text-primary hover:underline">
                                        {{ $quote->serviceRequest->title }}
                                    </a>
                                @else
                                    <span class="text-gray-500">Non disponible</span>
                                @endif
                            </p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Artisan</label>
                            <p>
                                @if($quote->artisan)
                                    <a href="{{ route('artisans.show', $quote->artisan) }}" class="text-primary hover:underline">
                                        {{ $quote->artisan->name }}
                                    </a>
                                @else
                                    <span class="text-gray-500">Non disponible</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            @if($quote->description)
            <div class="card">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Description</h2>
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
                        <button class="btn-secondary w-full">
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
@endsection