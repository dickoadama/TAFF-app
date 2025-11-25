@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Détails de la facture</h1>
        <div>
            <a href="{{ route('invoices.edit', $invoice) }}" class="btn-accent mr-2">
                <i class="fas fa-edit mr-2"></i>Modifier
            </a>
            <a href="{{ route('invoices.index') }}" class="btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="card mb-6">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Informations de la facture</h2>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Numéro de facture</label>
                            <p class="text-lg">{{ $invoice->invoice_number }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Statut</label>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($invoice->status == 'pending') bg-yellow-100 text-yellow-800
                                @elseif($invoice->status == 'paid') bg-green-100 text-green-800
                                @elseif($invoice->status == 'overdue') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ ucfirst($invoice->status) }}
                            </span>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Date d'émission</label>
                            <p>{{ $invoice->issued_date->format('d/m/Y') }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Date d'échéance</label>
                            <p>{{ $invoice->due_date->format('d/m/Y') }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Montant</label>
                            <p class="text-xl font-bold text-primary">{{ number_format($invoice->amount, 2, ',', ' ') }} €</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Devis associé</label>
                            <p>
                                @if($invoice->quote)
                                    <a href="{{ route('quotes.show', $invoice->quote) }}" class="text-primary hover:underline">
                                        Devis #{{ $invoice->quote->id }}
                                    </a>
                                @else
                                    <span class="text-gray-500">Non disponible</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            @if($invoice->notes)
            <div class="card">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Notes</h2>
                </div>
                <div class="card-body">
                    <p class="whitespace-pre-wrap">{{ $invoice->notes }}</p>
                </div>
            </div>
            @endif
        </div>
        
        <div>
            <div class="card mb-6">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Artisan</h2>
                </div>
                <div class="card-body">
                    @if($invoice->artisan)
                        <div class="flex items-center mb-4">
                            <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                                <i class="fas fa-user text-gray-500"></i>
                            </div>
                            <div>
                                <h3 class="font-bold">{{ $invoice->artisan->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $invoice->artisan->email }}</p>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-phone mr-2 text-gray-500"></i>
                                <span>{{ $invoice->artisan->phone ?? 'Non disponible' }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-map-marker-alt mr-2 text-gray-500"></i>
                                <span>{{ $invoice->artisan->address ?? 'Non disponible' }}</span>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500">Aucun artisan associé</p>
                    @endif
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Actions</h2>
                </div>
                <div class="card-body">
                    <div class="space-y-3">
                        <button class="btn-primary w-full">
                            <i class="fas fa-download mr-2"></i>Télécharger la facture
                        </button>
                        <button class="btn-secondary w-full">
                            <i class="fas fa-print mr-2"></i>Imprimer la facture
                        </button>
                        <form action="{{ route('invoices.destroy', $invoice) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger w-full" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette facture ?')">
                                <i class="fas fa-trash mr-2"></i>Supprimer la facture
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection