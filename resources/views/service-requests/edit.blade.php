@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Modifier une demande de service</h1>
        <a href="{{ route('service-requests.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('service-requests.update', $serviceRequest) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titre *</label>
                        <input type="text" name="title" id="title" class="form-input w-full" value="{{ old('title', $serviceRequest->title) }}" required>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="service_category_id" class="block text-sm font-medium text-gray-700 mb-2">Catégorie de service *</label>
                        <select name="service_category_id" id="service_category_id" class="form-input w-full" required>
                            <option value="">Sélectionnez une catégorie</option>
                            @foreach($serviceCategories as $category)
                                <option value="{{ $category->id }}" {{ (old('service_category_id', $serviceRequest->service_category_id) == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_category_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="artisan_id" class="block text-sm font-medium text-gray-700 mb-2">Artisan (optionnel)</label>
                        <select name="artisan_id" id="artisan_id" class="form-input w-full">
                            <option value="">Sélectionnez un artisan (optionnel)</option>
                            @foreach($artisans as $artisan)
                                <option value="{{ $artisan->id }}" {{ (old('artisan_id', $serviceRequest->artisan_id) == $artisan->id) ? 'selected' : '' }}>
                                    {{ $artisan->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('artisan_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Statut *</label>
                        <select name="status" id="status" class="form-input w-full" required>
                            <option value="pending" {{ (old('status', $serviceRequest->status) == 'pending') ? 'selected' : '' }}>En attente</option>
                            <option value="accepted" {{ (old('status', $serviceRequest->status) == 'accepted') ? 'selected' : '' }}>Acceptée</option>
                            <option value="in_progress" {{ (old('status', $serviceRequest->status) == 'in_progress') ? 'selected' : '' }}>En cours</option>
                            <option value="completed" {{ (old('status', $serviceRequest->status) == 'completed') ? 'selected' : '' }}>Terminée</option>
                            <option value="cancelled" {{ (old('status', $serviceRequest->status) == 'cancelled') ? 'selected' : '' }}>Annulée</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="preferred_date" class="block text-sm font-medium text-gray-700 mb-2">Date préférée</label>
                        <input type="datetime-local" name="preferred_date" id="preferred_date" class="form-input w-full" value="{{ old('preferred_date', $serviceRequest->preferred_date ? $serviceRequest->preferred_date->format('Y-m-d\TH:i') : '') }}">
                        @error('preferred_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Adresse</label>
                        <textarea name="address" id="address" rows="3" class="form-input w-full">{{ old('address', $serviceRequest->address) }}</textarea>
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                        <textarea name="description" id="description" rows="5" class="form-input w-full" required>{{ old('description', $serviceRequest->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-6">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save mr-2"></i>Mettre à jour la demande
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection