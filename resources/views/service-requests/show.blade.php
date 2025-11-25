@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Détails de la demande de service</h1>
        <div>
            <a href="{{ route('service-requests.edit', $serviceRequest) }}" class="btn-accent mr-2">
                <i class="fas fa-edit mr-2"></i>Modifier
            </a>
            <a href="{{ route('service-requests.index') }}" class="btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="card mb-6">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Informations de la demande</h2>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Titre</label>
                            <p class="text-lg">{{ $serviceRequest->title }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Statut</label>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($serviceRequest->status == 'pending') bg-yellow-100 text-yellow-800
                                @elseif($serviceRequest->status == 'accepted') bg-blue-100 text-blue-800
                                @elseif($serviceRequest->status == 'in_progress') bg-indigo-100 text-indigo-800
                                @elseif($serviceRequest->status == 'completed') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800
                                @endif">
                                {{ ucfirst($serviceRequest->status) }}
                            </span>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Catégorie</label>
                            <p>{{ $serviceRequest->serviceCategory->name ?? 'N/A' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Artisan assigné</label>
                            <p>
                                @if($serviceRequest->artisan)
                                    <a href="{{ route('artisans.show', $serviceRequest->artisan) }}" class="text-primary hover:underline">
                                        {{ $serviceRequest->artisan->name }}
                                    </a>
                                @else
                                    <span class="text-gray-500">Non assigné</span>
                                @endif
                            </p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Utilisateur</label>
                            <p>{{ $serviceRequest->user->name ?? 'N/A' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Date préférée</label>
                            <p>
                                @if($serviceRequest->preferred_date)
                                    {{ $serviceRequest->preferred_date->format('d/m/Y H:i')
                                 }}
                                @else
                                    <span class="text-gray-500">N/A</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mb-6">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Description</h2>
                </div>
                <div class="card-body">
                    <p class="whitespace-pre-wrap">{{ $serviceRequest->description }}</p>
                </div>
            </div>
            
            @if($serviceRequest->address)
            <div class="card">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Adresse</h2>
                </div>
                <div class="card-body">
                    <p class="whitespace-pre-wrap">{{ $serviceRequest->address }}</p>
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
                        <a href="{{ route('quotes.create', ['service_request_id' => $serviceRequest->id]) }}" class="btn-primary w-full text-center">
                            <i class="fas fa-file-invoice mr-2"></i>Créer un devis
                        </a>
                        
                        @if($serviceRequest->quotes->count() > 0 && !$serviceRequest->quote_id)
                        <form action="{{ route('service-requests.select-quote', $serviceRequest) }}" method="POST">
                            @csrf
                            <div class="flex space-x-2">
                                <select name="quote_id" class="form-input flex-1">
                                    <option value="">Sélectionner un devis</option>
                                    @foreach($serviceRequest->quotes as $quote)
                                        <option value="{{ $quote->id }}">#{{ $quote->id }} - {{ number_format($quote->amount, 2, ',', ' ') }} € ({{ $quote->artisan->name ?? 'Artisan inconnu' }})</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn-accent">
                                    <i class="fas fa-check mr-2"></i>Sélectionner
                                </button>
                            </div>
                        </form>
                        @endif
                        
                        @if($serviceRequest->quote && $serviceRequest->quote->status == 'accepted' && !$serviceRequest->invoice_id)
                        <form action="{{ route('service-requests.generate-invoice', $serviceRequest) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-success w-full">
                                <i class="fas fa-file-invoice-dollar mr-2"></i>Générer la facture
                            </button>
                        </form>
                        @endif
                        
                        <form action="{{ route('service-requests.destroy', $serviceRequest) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger w-full" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette demande de service ?')">
                                <i class="fas fa-trash mr-2"></i>Supprimer la demande
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
                        <p>Créé le: {{ $serviceRequest->created_at->format('d/m/Y H:i') }}</p>
                        <p>Modifié le: {{ $serviceRequest->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>
            
            @if($serviceRequest->quote)
            <div class="card mb-6">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Devis sélectionné</h2>
                </div>
                <div class="card-body">
                    <div class="flex justify-between items-center p-4 bg-blue-50 rounded-lg">
                        <div>
                            <p class="font-medium">#{{ $serviceRequest->quote->id }} - {{ number_format($serviceRequest->quote->amount, 2, ',', ' ') }} €</p>
                            <p class="text-sm text-gray-500">{{ $serviceRequest->quote->artisan->name ?? 'Artisan inconnu' }}</p>
                        </div>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            @if($serviceRequest->quote->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($serviceRequest->quote->status == 'accepted') bg-blue-100 text-blue-800
                            @elseif($serviceRequest->quote->status == 'rejected') bg-red-100 text-red-800
                            @else bg-gray-100 text-gray-800
                            @endif">
                            {{ ucfirst($serviceRequest->quote->status) }}
                        </span>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-gray-600">{{ $serviceRequest->quote->description }}</p>
                    </div>
                    <div class="mt-4 text-sm text-gray-500">
                        <p>Valide jusqu'au: {{ $serviceRequest->quote->valid_until ? $serviceRequest->quote->valid_until->format('d/m/Y') : 'N/A' }}</p>
                    </div>
                </div>
            </div>
            @endif

            @if($serviceRequest->invoice)
            <div class="card mb-6">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Facture associée</h2>
                </div>
                <div class="card-body">
                    <div class="flex justify-between items-center p-4 bg-green-50 rounded-lg">
                        <div>
                            <p class="font-medium">#{{ $serviceRequest->invoice->invoice_number }} - {{ number_format($serviceRequest->invoice->amount, 2, ',', ' ') }} €</p>
                            <p class="text-sm text-gray-500">{{ $serviceRequest->invoice->artisan->name ?? 'Artisan inconnu' }}</p>
                        </div>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            @if($serviceRequest->invoice->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($serviceRequest->invoice->status == 'paid') bg-green-100 text-green-800
                            @elseif($serviceRequest->invoice->status == 'overdue') bg-red-100 text-red-800
                            @else bg-gray-100 text-gray-800
                            @endif">
                            {{ ucfirst($serviceRequest->invoice->status) }}
                        </span>
                    </div>
                    <div class="mt-4 text-sm text-gray-500">
                        <p>Date d'émission: {{ $serviceRequest->invoice->issued_date ? $serviceRequest->invoice->issued_date->format('d/m/Y') : 'N/A' }}</p>
                        <p>Date d'échéance: {{ $serviceRequest->invoice->due_date ? $serviceRequest->invoice->due_date->format('d/m/Y') : 'N/A' }}</p>
                    </div>
                    @if($serviceRequest->invoice->notes)
                    <div class="mt-4">
                        <p class="text-sm text-gray-600">Notes: {{ $serviceRequest->invoice->notes }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            @if($serviceRequest->quotes->count() > 0)
            <div class="card">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Tous les devis associés</h2>
                </div>
                <div class="card-body">
                    <div class="space-y-2">
                        @foreach($serviceRequest->quotes as $quote)
                        <div class="flex justify-between items-center p-2 hover:bg-gray-50 rounded">
                            <div>
                                <p class="font-medium">#{{ $quote->id }} - {{ number_format($quote->amount, 2, ',', ' ') }} €</p>
                                <p class="text-sm text-gray-500">{{ $quote->artisan->name ?? 'Artisan inconnu' }}</p>
                            </div>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($quote->status == 'pending') bg-yellow-100 text-yellow-800
                                @elseif($quote->status == 'accepted') bg-blue-100 text-blue-800
                                @elseif($quote->status == 'rejected') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ ucfirst($quote->status) }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection