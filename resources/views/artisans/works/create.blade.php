@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="card">
        <div class="card-header">
            <h1>Ajouter une réalisation</h1>
        </div>
        <div class="card-body">
            <p class="text-gray-600 mb-6">
                Ajoutez une nouvelle réalisation pour {{ $artisan->name }}.
            </p>
            
            <form action="{{ route('artisans.works.store', $artisan) }}" method="POST" enctype="multipart/form-data" class="space-y-6 transition-all duration-300">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="form-label">Titre *</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required class="form-input transition-all duration-300 focus:ring-2 focus:ring-primary focus:border-transparent">
                        @error('title')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="category" class="form-label">Catégorie</label>
                        <input type="text" name="category" id="category" value="{{ old('category') }}" class="form-input transition-all duration-300 focus:ring-2 focus:ring-primary focus:border-transparent">
                        @error('category')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="completion_date" class="form-label">Date d'achèvement</label>
                        <input type="date" name="completion_date" id="completion_date" value="{{ old('completion_date') }}" class="form-input transition-all duration-300 focus:ring-2 focus:ring-primary focus:border-transparent">
                        @error('completion_date')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="client_name" class="form-label">Nom du client</label>
                        <input type="text" name="client_name" id="client_name" value="{{ old('client_name') }}" class="form-input transition-all duration-300 focus:ring-2 focus:ring-primary focus:border-transparent">
                        @error('client_name')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="5" class="form-input transition-all duration-300 focus:ring-2 focus:ring-primary focus:border-transparent">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-input transition-all duration-300 focus:ring-2 focus:ring-primary focus:border-transparent" accept="image/*">
                        @error('image')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray-500">Formats acceptés: JPEG, PNG, JPG, GIF. Taille maximale: 2MB.</p>
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <a href="{{ route('artisans.works.index', $artisan) }}" class="btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i>Retour au portfolio
                    </a>
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save mr-2"></i>Ajouter la réalisation
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection