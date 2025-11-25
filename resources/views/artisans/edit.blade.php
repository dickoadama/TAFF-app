@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="card">
        <div class="card-header">
            <h1>Modifier un artisan</h1>
        </div>
        <div class="card-body">
            <p class="text-gray-600 mb-6">
                Modifiez les informations de l'artisan ci-dessous.
            </p>
            
            <form action="{{ route('artisans.update', $artisan) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="form-label">Nom complet</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $artisan->name) }}" required class="form-input">
                        @error('name')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $artisan->email) }}" required class="form-input">
                        @error('email')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $artisan->phone) }}" class="form-input">
                        @error('phone')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="service_category_id" class="form-label">Catégorie de service</label>
                        <select name="service_category_id" id="service_category_id" required class="form-input">
                            <option value="">Sélectionnez une catégorie</option>
                            @foreach($serviceCategories as $category)
                                <option value="{{ $category->id }}" {{ old('service_category_id', $artisan->service_category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_category_id')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="address" class="form-label">Adresse</label>
                        <textarea name="address" id="address" rows="3" class="form-input">{{ old('address', $artisan->address) }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="skills" class="form-label">Compétences</label>
                        <textarea name="skills" id="skills" rows="3" class="form-input">{{ old('skills', $artisan->skills) }}</textarea>
                        @error('skills')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="5" class="form-input">{{ old('description', $artisan->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="rating" class="form-label">Note moyenne</label>
                        <input type="number" step="0.01" min="0" max="5" name="rating" id="rating" value="{{ old('rating', $artisan->rating) }}" class="form-input">
                        @error('rating')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="review_count" class="form-label">Nombre d'avis</label>
                        <input type="number" name="review_count" id="review_count" value="{{ old('review_count', $artisan->review_count) }}" class="form-input">
                        @error('review_count')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="available" class="form-label">Disponible</label>
                        <select name="available" id="available" class="form-input">
                            <option value="1" {{ old('available', $artisan->available) ? 'selected' : '' }}>Oui</option>
                            <option value="0" {{ old('available', $artisan->available) ? '' : 'selected' }}>Non</option>
                        </select>
                        @error('available')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="flex items-center justify-end space-x-4 pt-6">
                    <a href="{{ route('artisans.index') }}" class="btn-secondary">
                        Annuler
                    </a>
                    <button type="submit" class="btn-primary">
                        Mettre à jour l'artisan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection