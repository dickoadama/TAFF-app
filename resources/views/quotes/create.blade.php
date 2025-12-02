@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Créer un devis</h1>
        <a href="{{ route('quotes.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('quotes.store') }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="service_request_id" class="block text-sm font-medium text-gray-700 mb-2">Demande de service *</label>
                        <select name="service_request_id" id="service_request_id" class="form-input w-full" required>
                            <option value="">Sélectionnez une demande de service</option>
                            @foreach($serviceRequests as $request)
                                <option value="{{ $request->id }}" {{ old('service_request_id') == $request->id ? 'selected' : '' }}>
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
                                <option value="{{ $artisan->id }}" {{ old('artisan_id') == $artisan->id ? 'selected' : '' }}>
                                    {{ $artisan->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('artisan_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="product_id" class="block text-sm font-medium text-gray-700 mb-2">Marchandise</label>
                        <select name="product_id" id="product_id" class="form-input w-full">
                            <option value="">Sélectionnez une marchandise</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label for="price_ht" class="block text-sm font-medium text-gray-700 mb-2">Prix HT (€)</label>
                        <input type="number" step="0.01" name="price_ht" id="price_ht" class="form-input w-full" value="{{ old('price_ht') }}" readonly>
                    </div>
                    
                    <div>
                        <label for="tax_rate" class="block text-sm font-medium text-gray-700 mb-2">TVA (%)</label>
                        <input type="number" step="0.01" name="tax_rate" id="tax_rate" class="form-input w-full" value="{{ old('tax_rate') }}" readonly>
                    </div>
                    
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Prix TTC (€) *</label>
                        <input type="number" step="0.01" name="amount" id="amount" class="form-input w-full" value="{{ old('amount') }}" required>
                        @error('amount')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="valid_until" class="block text-sm font-medium text-gray-700 mb-2">Valide jusqu'au</label>
                        <input type="date" name="valid_until" id="valid_until" class="form-input w-full" value="{{ old('valid_until') }}">
                        @error('valid_until')
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
                        <i class="fas fa-save mr-2"></i>Créer le devis
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const productSelect = document.getElementById('product_id');
    const priceHtInput = document.getElementById('price_ht');
    const taxRateInput = document.getElementById('tax_rate');
    const amountInput = document.getElementById('amount');
    
    productSelect.addEventListener('change', function() {
        const productId = this.value;
        
        if (productId) {
            fetch(`/products/get-product-details/${productId}`)
                .then(response => response.json())
                .then(data => {
                    if (!data.error) {
                        priceHtInput.value = data.price_ht.toFixed(2);
                        taxRateInput.value = data.tax_rate.toFixed(2);
                        amountInput.value = data.price_ttc.toFixed(2);
                    } else {
                        priceHtInput.value = '';
                        taxRateInput.value = '';
                        amountInput.value = '';
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    priceHtInput.value = '';
                    taxRateInput.value = '';
                    amountInput.value = '';
                });
        } else {
            priceHtInput.value = '';
            taxRateInput.value = '';
            amountInput.value = '';
        }
    });
});
</script>
@endsection