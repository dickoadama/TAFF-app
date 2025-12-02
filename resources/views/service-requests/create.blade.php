@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="card">
        <div class="card-header">
            <h1 class="text-2xl font-bold">Créer une demande de service</h1>
        </div>
        <div class="card-body">
            <p class="text-gray-600 mb-6">
                Remplissez le formulaire ci-dessous pour demander un service à un artisan.
            </p>
            
            <form action="{{ route('service-requests.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Catégorie de service -->
                    <div class="form-group">
                        <label for="service_category_id" class="form-label">Catégorie de service *</label>
                        <select name="service_category_id" id="service_category_id" class="form-input" required>
                            <option value="">Sélectionnez une catégorie</option>
                            @foreach($serviceCategories as $category)
                                <option value="{{ $category->id }}" {{ old('service_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_category_id')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Artisan -->
                    <div class="form-group">
                        <label for="artisan_id" class="form-label">Artisan *</label>
                        <select name="artisan_id" id="artisan_id" class="form-input" required>
                            <option value="">Sélectionnez un artisan</option>
                            @if($selectedArtisan)
                                <option value="{{ $selectedArtisan->id }}" selected>
                                    {{ $selectedArtisan->name }} ({{ $selectedArtisan->serviceCategory->name ?? 'Catégorie non définie' }})
                                </option>
                            @endif
                            @foreach($artisans as $artisan)
                                @if(!$selectedArtisan || $artisan->id != $selectedArtisan->id)
                                    <option value="{{ $artisan->id }}" {{ old('artisan_id') == $artisan->id ? 'selected' : '' }}>
                                        {{ $artisan->name }} ({{ $artisan->serviceCategory->name ?? 'Catégorie non définie' }})
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('artisan_id')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <!-- Titre de la demande -->
                <div class="form-group">
                    <label for="title" class="form-label">Titre de la demande *</label>
                    <input type="text" name="title" id="title" class="form-input" value="{{ old('title') }}" required placeholder="Ex: Réparation de fuite d'eau dans la cuisine">
                    @error('title')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Description détaillée -->
                <div class="form-group">
                    <label for="description" class="form-label">Description détaillée *</label>
                    <textarea name="description" id="description" rows="5" class="form-input" required placeholder="Décrivez en détail le service que vous souhaitez demander...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Date souhaitée -->
                    <div class="form-group">
                        <label for="preferred_date" class="form-label">Date souhaitée</label>
                        <input type="date" name="preferred_date" id="preferred_date" class="form-input" value="{{ old('preferred_date') }}">
                        @error('preferred_date')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Budget estimé -->
                    <div class="form-group">
                        <label for="budget" class="form-label">Budget estimé (FCFA)</label>
                        <input type="number" name="budget" id="budget" class="form-input" value="{{ old('budget') }}" min="0" placeholder="Ex: 50000">
                        @error('budget')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <!-- Adresse -->
                <div class="form-group">
                    <label for="address" class="form-label">Adresse où réaliser le service</label>
                    <input type="text" name="address" id="address" class="form-input" value="{{ old('address') }}" placeholder="Adresse complète du lieu d'intervention">
                    @error('address')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Actions -->
                <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                    <a href="{{ route('service-requests.index') }}" class="btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
                    </a>
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-paper-plane mr-2"></i>Envoyer la demande
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection