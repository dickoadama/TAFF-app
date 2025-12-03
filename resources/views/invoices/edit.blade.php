@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Modifier une facture</h1>
        <a href="{{ route('invoices.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('invoices.update', $invoice) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label for="quote_id" class="block text-sm font-medium text-gray-700 mb-2">Devis associé (optionnel)</label>
                        <select name="quote_id" id="quote_id" class="form-input w-full">
                            <option value="">Sélectionnez un devis (optionnel)</option>
                            @foreach($quotes as $quote)
                                <option value="{{ $quote->id }}" {{ $invoice->quote_id == $quote->id ? 'selected' : '' }}>
                                    Devis #{{ $quote->id }} - {{ $quote->artisan->name ?? 'Artisan inconnu' }}
                                </option>
                            @endforeach
                        </select>
                        @error('quote_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="artisan_id" class="block text-sm font-medium text-gray-700 mb-2">Artisan (optionnel)</label>
                        <select name="artisan_id" id="artisan_id" class="form-input w-full">
                            <option value="">Sélectionnez un artisan (optionnel)</option>
                            @foreach($quotes as $quote)
                                @if($quote->artisan)
                                    <option value="{{ $quote->artisan->id }}" {{ $invoice->artisan_id == $quote->artisan->id ? 'selected' : '' }}>
                                        {{ $quote->artisan->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('artisan_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="operation_type" class="block text-sm font-medium text-gray-700 mb-2">Type d'opération *</label>
                        <select name="operation_type" id="operation_type" class="form-input w-full" required>
                            <option value="purchase" {{ old('operation_type', $invoice->operation_type) == 'purchase' ? 'selected' : '' }}>Achat/Devis</option>
                            <option value="credit" {{ old('operation_type', $invoice->operation_type) == 'credit' ? 'selected' : '' }}>Crédit</option>
                            <option value="refund" {{ old('operation_type', $invoice->operation_type) == 'refund' ? 'selected' : '' }}>Avoir</option>
                        </select>
                        @error('operation_type')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div id="credit-status-field" class="{{ $invoice->operation_type != 'credit' ? 'hidden' : '' }}">
                        <label for="credit_status" class="block text-sm font-medium text-gray-700 mb-2">Statut du crédit *</label>
                        <select name="credit_status" id="credit_status" class="form-input w-full">
                            <option value="issued" {{ old('credit_status', $invoice->credit_status) == 'issued' ? 'selected' : '' }}>Crédit sorti</option>
                            <option value="paid" {{ old('credit_status', $invoice->credit_status) == 'paid' ? 'selected' : '' }}>Crédit payé</option>
                        </select>
                        @error('credit_status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div id="refund-status-field" class="{{ $invoice->operation_type != 'refund' ? 'hidden' : '' }}">
                        <label for="refund_status" class="block text-sm font-medium text-gray-700 mb-2">Statut de l'avoir *</label>
                        <select name="refund_status" id="refund_status" class="form-input w-full">
                            <option value="credit" {{ old('refund_status', $invoice->refund_status) == 'credit' ? 'selected' : '' }}>Avoir</option>
                            <option value="withdrawal" {{ old('refund_status', $invoice->refund_status) == 'withdrawal' ? 'selected' : '' }}>Retrait d'avoir</option>
                        </select>
                        @error('refund_status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="client_full_name" class="block text-sm font-medium text-gray-700 mb-2">Nom complet du client *</label>
                        <input type="text" name="client_full_name" id="client_full_name" class="form-input w-full" value="{{ old('client_full_name', $invoice->client_full_name) }}" required>
                        @error('client_full_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="client_contact" class="block text-sm font-medium text-gray-700 mb-2">Contact du client *</label>
                        <input type="text" name="client_contact" id="client_contact" class="form-input w-full" value="{{ old('client_contact', $invoice->client_contact) }}" required>
                        @error('client_contact')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="invoice_number" class="block text-sm font-medium text-gray-700 mb-2">Numéro de facture *</label>
                        <input type="text" name="invoice_number" id="invoice_number" class="form-input w-full" value="{{ old('invoice_number', $invoice->invoice_number) }}" required>
                        @error('invoice_number')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="issued_date" class="block text-sm font-medium text-gray-700 mb-2">Date d'émission *</label>
                        <input type="date" name="issued_date" id="issued_date" class="form-input w-full" value="{{ old('issued_date', $invoice->issued_date->format('Y-m-d')) }}" required>
                        @error('issued_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="due_date" class="block text-sm font-medium text-gray-700 mb-2">Date d'échéance *</label>
                        <input type="date" name="due_date" id="due_date" class="form-input w-full" value="{{ old('due_date', $invoice->due_date->format('Y-m-d')) }}" required>
                        @error('due_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Statut *</label>
                        <select name="status" id="status" class="form-input w-full" required>
                            <option value="pending" {{ old('status', $invoice->status) == 'pending' ? 'selected' : '' }}>En attente</option>
                            <option value="paid" {{ old('status', $invoice->status) == 'paid' ? 'selected' : '' }}>Payé</option>
                            <option value="overdue" {{ old('status', $invoice->status) == 'overdue' ? 'selected' : '' }}>En retard</option>
                            <option value="cancelled" {{ old('status', $invoice->status) == 'cancelled' ? 'selected' : '' }}>Annulé</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Lignes de facture -->
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-gray-800">Détails des produits</h2>
                        <button type="button" id="add-item" class="btn-primary">
                            <i class="fas fa-plus mr-2"></i>Ajouter un produit
                        </button>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Désignation</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Quantité</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Prix unitaire</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">TVA (%)</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Remise (%)</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="invoice-items">
                                @forelse($invoice->items as $index => $item)
                                <tr class="invoice-item">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">
                                        <select name="items[{{ $index }}][product_id]" class="form-input w-full product-select" required>
                                            <option value="">Sélectionnez un produit</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}" {{ $item->product_id == $product->id ? 'selected' : '' }} data-price="{{ $product->price_ht }}" data-tax="{{ $product->tax_rate }}">
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="number" name="items[{{ $index }}][quantity]" class="form-input w-full text-right quantity-input" value="{{ $item->quantity }}" min="1" required>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="number" step="0.01" name="items[{{ $index }}][unit_price]" class="form-input w-full text-right unit-price-input" value="{{ $item->unit_price }}" required>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="number" step="0.01" name="items[{{ $index }}][tax_rate]" class="form-input w-full text-right tax-rate-input" value="{{ $item->tax_rate }}" min="0" max="100">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="number" step="0.01" name="items[{{ $index }}][discount_rate]" class="form-input w-full text-right discount-rate-input" value="{{ $item->discount_rate }}" min="0" max="100">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <span class="item-total">{{ number_format($item->total_price, 2, '.', '') }}</span> €
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button type="button" class="remove-item text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr class="invoice-item">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                                    <td class="px-6 py-4">
                                        <select name="items[0][product_id]" class="form-input w-full product-select" required>
                                            <option value="">Sélectionnez un produit</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}" data-price="{{ $product->price_ht }}" data-tax="{{ $product->tax_rate }}">
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="number" name="items[0][quantity]" class="form-input w-full text-right quantity-input" value="1" min="1" required>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="number" step="0.01" name="items[0][unit_price]" class="form-input w-full text-right unit-price-input" value="0.00" required>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="number" step="0.01" name="items[0][tax_rate]" class="form-input w-full text-right tax-rate-input" value="20.00" min="0" max="100">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="number" step="0.01" name="items[0][discount_rate]" class="form-input w-full text-right discount-rate-input" value="0.00" min="0" max="100">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <span class="item-total">0.00</span> €
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button type="button" class="remove-item text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="border-t pt-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-bold">Total facture</h3>
                        </div>
                        <div class="text-right">
                            <div class="text-2xl font-bold">
                                Total TTC: <span id="invoice-total">{{ number_format($invoice->total_amount, 2, '.', '') }}</span> €
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save mr-2"></i>Mettre à jour la facture
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Variable cachée pour stocker le nombre d'éléments -->
    <div id="item-count" style="display: none;">{{ $invoice->items->count() > 0 ? $invoice->items->count() : 1 }}</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialiser itemIndex avec le nombre d'éléments existants ou 1
    let itemIndex = parseInt(document.getElementById('item-count').textContent);
    
    // Gérer la sélection du devis et mettre à jour l'artisan automatiquement
    document.getElementById('quote_id').addEventListener('change', function() {
        const quoteId = this.value;
        const artisanSelect = document.getElementById('artisan_id');
        
        // Réinitialiser la sélection de l'artisan
        artisanSelect.value = '';
        
        // Si un devis est sélectionné, trouver l'artisan associé
        if (quoteId) {
            // Trouver l'option du devis sélectionné
            const selectedOption = this.options[this.selectedIndex];
            // Mettre à jour l'artisan en conséquence
            // Note: Nous pourrions faire une requête AJAX ici pour obtenir l'artisan associé au devis
            // Pour l'instant, nous laissons l'utilisateur le sélectionner manuellement s'il le souhaite
        }
    });
    
    // Gérer l'affichage des champs spécifiques selon le type d'opération
    document.getElementById('operation_type').addEventListener('change', function() {
        const operationType = this.value;
        const creditStatusField = document.getElementById('credit-status-field');
        const refundStatusField = document.getElementById('refund-status-field');
        
        // Masquer tous les champs spécifiques
        creditStatusField.classList.add('hidden');
        refundStatusField.classList.add('hidden');
        
        // Afficher le champ approprié selon le type d'opération
        if (operationType === 'credit') {
            creditStatusField.classList.remove('hidden');
        } else if (operationType === 'refund') {
            refundStatusField.classList.remove('hidden');
        }
    });
    
    // Ajouter un nouvel élément de facture
    document.getElementById('add-item').addEventListener('click', function() {
        const itemsContainer = document.getElementById('invoice-items');
        const newItem = document.querySelector('.invoice-item').cloneNode(true);
        
        // Mettre à jour le numéro d'ordre
        newItem.querySelector('td:first-child').textContent = itemIndex + 1;
        
        // Mettre à jour les attributs name
        const inputs = newItem.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            if (input.name) {
                input.name = input.name.replace(/\[\d+\]/, '[' + itemIndex + ']');
            }
            // Réinitialiser les valeurs
            if (input.type === 'number' || input.type === 'text') {
                if (input.classList.contains('quantity-input')) {
                    input.value = '1';
                } else if (input.classList.contains('unit-price-input')) {
                    input.value = '0.00';
                } else if (input.classList.contains('tax-rate-input')) {
                    input.value = '20.00';
                } else if (input.classList.contains('discount-rate-input')) {
                    input.value = '0.00';
                } else {
                    input.value = '';
                }
            } else if (input.tagName === 'SELECT') {
                input.selectedIndex = 0;
            } else if (input.tagName === 'TEXTAREA') {
                input.value = '';
            }
        });
        
        // Réinitialiser le total de l'élément
        newItem.querySelector('.item-total').textContent = '0.00';
        
        itemsContainer.appendChild(newItem);
        itemIndex++;
        
        // Attacher les événements aux nouveaux éléments
        attachEventsToItem(newItem);
        calculateInvoiceTotal();
    });
    
    // Attacher les événements aux éléments existants
    document.querySelectorAll('.invoice-item').forEach(item => {
        attachEventsToItem(item);
    });
    
    // Calculer le total de la facture
    function calculateInvoiceTotal() {
        let total = 0;
        document.querySelectorAll('.item-total').forEach(element => {
            total += parseFloat(element.textContent) || 0;
        });
        document.getElementById('invoice-total').textContent = total.toFixed(2);
    }
    
    // Attacher les événements à un élément de facture
    function attachEventsToItem(item) {
        // Supprimer un élément
        const removeButton = item.querySelector('.remove-item');
        if (removeButton) {
            removeButton.addEventListener('click', function() {
                if (document.querySelectorAll('.invoice-item').length > 1) {
                    item.remove();
                    // Mettre à jour les numéros d'ordre
                    updateItemNumbers();
                    calculateInvoiceTotal();
                } else {
                    alert('Vous devez avoir au moins un produit dans la facture.');
                }
            });
        }
        
        // Mettre à jour les prix quand le produit change
        const productSelect = item.querySelector('.product-select');
        const unitPriceInput = item.querySelector('.unit-price-input');
        const taxRateInput = item.querySelector('.tax-rate-input');
        
        if (productSelect) {
            productSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                if (selectedOption.value) {
                    const price = selectedOption.getAttribute('data-price');
                    const tax = selectedOption.getAttribute('data-tax');
                    unitPriceInput.value = parseFloat(price).toFixed(2);
                    taxRateInput.value = parseFloat(tax).toFixed(2);
                    calculateItemTotal(item);
                }
            });
        }
        
        // Calculer le total quand les champs changent
        const quantityInput = item.querySelector('.quantity-input');
        const discountRateInput = item.querySelector('.discount-rate-input');
        
        [unitPriceInput, quantityInput, taxRateInput, discountRateInput].forEach(input => {
            if (input) {
                input.addEventListener('input', function() {
                    calculateItemTotal(item);
                });
            }
        });
        
        // Calculer le total initial
        calculateItemTotal(item);
    }
    
    // Calculer le total d'un élément de facture
    function calculateItemTotal(item) {
        const unitPrice = parseFloat(item.querySelector('.unit-price-input').value) || 0;
        const quantity = parseInt(item.querySelector('.quantity-input').value) || 0;
        const taxRate = parseFloat(item.querySelector('.tax-rate-input').value) || 0;
        const discountRate = parseFloat(item.querySelector('.discount-rate-input').value) || 0;
        
        const subtotal = unitPrice * quantity;
        const discountAmount = subtotal * (discountRate / 100);
        const subtotalAfterDiscount = subtotal - discountAmount;
        const taxAmount = subtotalAfterDiscount * (taxRate / 100);
        const total = subtotalAfterDiscount + taxAmount;
        
        item.querySelector('.item-total').textContent = total.toFixed(2);
        calculateInvoiceTotal();
    }
    
    // Mettre à jour les numéros d'ordre
    function updateItemNumbers() {
        document.querySelectorAll('.invoice-item').forEach((item, index) => {
            item.querySelector('td:first-child').textContent = index + 1;
        });
    }
});
</script>
@endsection