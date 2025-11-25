@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Modifier un devis</h1>
        <a href="{{ route('quotes.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('quotes.update', $quote) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="service_request_id" class="block text-sm font-medium text-gray-700 mb-2">Demande de service *</label>
                        <select name="service_request_id" id="service_request_id" class="form-input w-full" required>
                            <option value="">Sélectionnez une demande de service</option>
                            @foreach($serviceRequests as $request)
                                <option value="{{ $request->id }}" {{ (old('service_request_id', $quote->service_request_id) == $request->id) ? 'selected' : '' }}>
                                    {{ $request->title }} - {{ $request->user->name ?? 'Utilisateur inconnu' }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_request_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="artisan_id" class="block text-sm font-medium text-gray-700 mb-2">Artisan *</label>
                        <select name="artisan_id" id="artisan_id" class="form-input w-full" required>
                            <option value="">Sélectionnez un artisan</option>
                            @foreach($artisans as $artisan)
                                <option value="{{ $artisan->id }}" {{ (old('artisan_id', $quote->artisan_id) == $artisan->id) ? 'selected' : '' }}>
                                    {{ $artisan->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('artisan_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Montant *</label>
                        <input type="number" step="0.01" name="amount" id="amount" class="form-input w-full" value="{{ old('amount', $quote->amount) }}" required>
                        @error('amount')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="valid_until" class="block text-sm font-medium text-gray-700 mb-2">Valide jusqu'au</label>
                        <input type="date" name="valid_until" id="valid_until" class="form-input w-full" value="{{ old('valid_until', $quote->valid_until ? $quote->valid_until->format('Y-m-d') : '') }}">
                        @error('valid_until')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Statut *</label>
                        <select name="status" id="status" class="form-input w-full" required>
                            <option value="pending" {{ (old('status', $quote->status) == 'pending') ? 'selected' : '' }}>En attente</option>
                            <option value="accepted" {{ (old('status', $quote->status) == 'accepted') ? 'selected' : '' }}>Accepté</option>
                            <option value="rejected" {{ (old('status', $quote->status) == 'rejected') ? 'selected' : '' }}>Rejeté</option>
                            <option value="expired" {{ (old('status', $quote->status) == 'expired') ? 'selected' : '' }}>Expiré</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-input w-full">{{ old('description', $quote->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-6">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save mr-2"></i>Mettre à jour le devis
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection