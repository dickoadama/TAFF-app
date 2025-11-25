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
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="quote_id" class="block text-sm font-medium text-gray-700 mb-2">Devis *</label>
                        <select name="quote_id" id="quote_id" class="form-input w-full" required>
                            <option value="">Sélectionnez un devis</option>
                            @foreach($quotes as $quote)
                                <option value="{{ $quote->id }}" {{ (old('quote_id', $invoice->quote_id) == $quote->id) ? 'selected' : '' }}>
                                    Devis #{{ $quote->id }} - {{ $quote->artisan->name ?? 'Artisan inconnu' }} ({{ number_format($quote->amount, 2, ',', ' ') }} €)
                                </option>
                            @endforeach
                        </select>
                        @error('quote_id')
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
                            <option value="pending" {{ (old('status', $invoice->status) == 'pending') ? 'selected' : '' }}>En attente</option>
                            <option value="paid" {{ (old('status', $invoice->status) == 'paid') ? 'selected' : '' }}>Payée</option>
                            <option value="overdue" {{ (old('status', $invoice->status) == 'overdue') ? 'selected' : '' }}>En retard</option>
                            <option value="cancelled" {{ (old('status', $invoice->status) == 'cancelled') ? 'selected' : '' }}>Annulée</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                        <textarea name="notes" id="notes" rows="4" class="form-input w-full">{{ old('notes', $invoice->notes) }}</textarea>
                        @error('notes')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
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
</div>
@endsection