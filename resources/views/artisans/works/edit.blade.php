@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="card">
        <div class="card-header">
            <h1>Modifier une réalisation</h1>
        </div>
        <div class="card-body">
            <p class="text-gray-600 mb-6">
                Modifiez les détails de la réalisation "{{ $work->title }}".
            </p>
            
            <form action="{{ route('artisans.works.update', [$artisan, $work]) }}" method="POST" enctype="multipart/form-data" class="space-y-6 transition-all duration-300">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="form-label">Titre *</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $work->title) }}" required class="form-input transition-all duration-300 focus:ring-2 focus:ring-primary focus:border-transparent">
                        @error('title')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="category" class="form-label">Catégorie</label>
                        <input type="text" name="category" id="category" value="{{ old('category', $work->category) }}" class="form-input transition-all duration-300 focus:ring-2 focus:ring-primary focus:border-transparent">
                        @error('category')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="completion_date" class="form-label">Date d'achèvement</label>
                        <input type="date" name="completion_date" id="completion_date" value="{{ old('completion_date', $work->completion_date ? $work->completion_date->format('Y-m-d') : '') }}" class="form-input transition-all duration-300 focus:ring-2 focus:ring-primary focus:border-transparent">
                        @error('completion_date')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="client_name" class="form-label">Nom du client</label>
                        <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $work->client_name) }}" class="form-input transition-all duration-300 focus:ring-2 focus:ring-primary focus:border-transparent">
                        @error('client_name')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="5" class="form-input transition-all duration-300 focus:ring-2 focus:ring-primary focus:border-transparent">{{ old('description', $work->description) }}</textarea>
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
                        
                        @if($work->image_path)
                        <div class="mt-4">
                            <p class="text-sm font-medium text-gray-700 mb-2">Image actuelle:</p>
                            <img src="{{ asset('storage/' . $work->image_path) }}" alt="{{ $work->title }}" class="w-32 h-32 object-cover rounded-lg">
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <a href="{{ route('artisans.works.index', $artisan) }}" class="btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i>Retour au portfolio
                    </a>
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save mr-2"></i>Mettre à jour la réalisation
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection