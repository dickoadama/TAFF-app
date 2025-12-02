@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Ajouter une marchandise</h1>
        <a href="{{ route('products.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom de la marchandise *</label>
                        <input type="text" name="name" id="name" class="form-input w-full" value="{{ old('name') }}" required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="price_ht" class="block text-sm font-medium text-gray-700 mb-2">Prix HT (€) *</label>
                        <input type="number" step="0.01" name="price_ht" id="price_ht" class="form-input w-full" value="{{ old('price_ht') }}" required>
                        @error('price_ht')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="tax_rate" class="block text-sm font-medium text-gray-700 mb-2">Taux de TVA (%)</label>
                        <input type="number" step="0.01" name="tax_rate" id="tax_rate" class="form-input w-full" value="{{ old('tax_rate', 20.00) }}" min="0" max="100">
                        @error('tax_rate')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-input w-full">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-6">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save mr-2"></i>Enregistrer la marchandise
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection