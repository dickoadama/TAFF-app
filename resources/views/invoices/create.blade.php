@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Créer une facture</h1>
        <a href="{{ route('invoices.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('invoices.store') }}" method="POST" id="invoice-form">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label for="operation_type" class="block text-sm font-medium text-gray-700 mb-2">Type d'opération *</label>
                        <select name="operation_type" id="operation_type" class="form-input w-full" required>
                            <option value="purchase">Achat/Devis</option>
                            <option value="credit">Crédit</option>
                            <option value="refund">Avoir</option>
                        </select>
                        @error('operation_type')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div id="credit-status-field" class="hidden">
                        <label for="credit_status" class="block text-sm font-medium text-gray-700 mb-2">Statut du crédit *</label>
                        <select name="credit_status" id="credit_status" class="form-input w-full">
                            <option value="issued">Crédit sorti</option>
                            <option value="paid">Crédit payé</option>
                        </select>
                        @error('credit_status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div id="refund-status-field" class="hidden">
                        <label for="refund_status" class="block text-sm font-medium text-gray-700 mb-2">Statut de l'avoir *</label>
                        <select name="refund_status" id="refund_status" class="form-input w-full">
                            <option value="credit">Avoir</option>
                            <option value="withdrawal">Retrait d'avoir</option>
                        </select>
                        @error('refund_status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="client_full_name" class="block text-sm font-medium text-gray-700 mb-2">Nom complet du client *</label>
                        <input type="text" name="client_full_name" id="client_full_name" class="form-input w-full" value="{{ old('client_full_name') }}" required>
                        @error('client_full_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="client_contact" class="block text-sm font-medium text-gray-700 mb-2">Contact du client *</label>
                        <input type="text" name="client_contact" id="client_contact" class="form-input w-full" value="{{ old('client_contact') }}" required>
                        @error('client_contact')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="issued_date" class="block text-sm font-medium text-gray-700 mb-2">Date d'émission *</label>
                        <input type="date" name="issued_date" id="issued_date" class="form-input w-full" value="{{ old('issued_date', date('Y-m-d')) }}" required>
                        @error('issued_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="due_date" class="block text-sm font-medium text-gray-700 mb-2">Date d'échéance *</label>
                        <input type="date" name="due_date" id="due_date" class="form-input w-full" value="{{ old('due_date') }}" required>
                        @error('due_date')
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
                                Total TTC: <span id="invoice-total">0.00</span> €
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save mr-2"></i>Créer la facture
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let itemIndex = 1;
    
    // Ajouter un écouteur d'événement pour le formulaire
    document.getElementById('invoice-form').addEventListener('submit', function(e) {
        console.log('Formulaire soumis');
        // Vous pouvez ajouter ici du code pour le débogage
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
                input.name = input.name.replace('[0]', '[' + itemIndex + ']');
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
    
    // Attacher les événements au premier élément
    attachEventsToItem(document.querySelector('.invoice-item'));
    
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