@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="card">
        <div class="card-header">
            <h1>Ajouter un nouvel artisan</h1>
        </div>
        <div class="card-body">
            <p class="text-gray-600 mb-6">
                Remplissez le formulaire ci-dessous pour ajouter un nouvel artisan à la plateforme.
            </p>
            
            <form action="{{ route('artisans.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="form-label">Nom complet</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required class="form-input">
                        @error('name')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required class="form-input">
                        @error('email')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-input">
                        @error('phone')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="service_category_id" class="form-label">Catégorie de service</label>
                        <select name="service_category_id" id="service_category_id" required class="form-input">
                            <option value="">Sélectionnez une catégorie</option>
                            @foreach($serviceCategories as $category)
                                <option value="{{ $category->id }}" {{ old('service_category_id') == $category->id ? 'selected' : '' }}>
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
                        <textarea name="address" id="address" rows="3" class="form-input">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="skills" class="form-label">Compétences</label>
                        <textarea name="skills" id="skills" rows="3" class="form-input">{{ old('skills') }}</textarea>
                        @error('skills')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="5" class="form-input">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="flex items-center justify-end space-x-4 pt-6">
                    <a href="{{ route('artisans.index') }}" class="btn-secondary">
                        Annuler
                    </a>
                    <button type="submit" class="btn-primary">
                        Ajouter l'artisan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection