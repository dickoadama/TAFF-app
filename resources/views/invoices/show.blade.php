@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Détails de la facture</h1>
        <div class="flex space-x-2">
            <a href="{{ route('invoices.edit', $invoice) }}" class="btn-secondary">
                <i class="fas fa-edit mr-2"></i>Modifier
            </a>
            <a href="{{ route('invoices.index') }}" class="btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
            </a>
        </div>
    </div>

    <!-- Facture A4 Style -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden" style="max-width: 210mm; margin: 0 auto;">
        <div class="p-8">
            <!-- En-tête de la facture -->
            <div class="border-b pb-6 mb-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">
                            @if($invoice->operation_type == 'purchase')
                                FACTURE
                            @elseif($invoice->operation_type == 'credit')
                                FACTURE DE CRÉDIT
                            @elseif($invoice->operation_type == 'refund')
                                FACTURE D'AVOIR
                            @endif
                        </h2>
                        
                        @if($invoice->operation_type == 'credit')
                            <p class="text-lg text-gray-600">
                                @if($invoice->credit_status == 'issued')
                                    Crédit sorti
                                @elseif($invoice->credit_status == 'paid')
                                    Crédit payé
                                @endif
                            </p>
                        @elseif($invoice->operation_type == 'refund')
                            <p class="text-lg text-gray-600">
                                @if($invoice->refund_status == 'credit')
                                    Avoir
                                @elseif($invoice->refund_status == 'withdrawal')
                                    Retrait d'avoir
                                @endif
                            </p>
                        @endif
                        
                        <p class="text-gray-600 mt-4">N° {{ $invoice->invoice_number }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-gray-600">Date d'émission: {{ $invoice->issued_date->format('d/m/Y') }}</p>
                        <p class="text-gray-600">Date d'échéance: {{ $invoice->due_date->format('d/m/Y') }}</p>
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold mt-4
                            @if($invoice->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($invoice->status == 'paid') bg-green-100 text-green-800
                            @elseif($invoice->status == 'overdue') bg-red-100 text-red-800
                            @elseif($invoice->status == 'cancelled') bg-gray-100 text-gray-800
                            @endif">
                            @if($invoice->status == 'pending') En attente
                            @elseif($invoice->status == 'paid') Payé
                            @elseif($invoice->status == 'overdue') En retard
                            @elseif($invoice->status == 'cancelled') Annulé
                            @endif
                        </span>
                    </div>
                </div>
            </div>

            <!-- Informations client -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Client</h3>
                    <p class="font-medium">{{ $invoice->client_full_name }}</p>
                    <p class="text-gray-600">{{ $invoice->client_contact }}</p>
                </div>
            </div>

            <!-- Lignes de facture -->
            <div class="mb-8">
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
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($invoice->items as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $item->product->name ?? 'Produit inconnu' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                                    {{ $item->quantity }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                                    {{ number_format($item->unit_price, 2, ',', ' ') }} €
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                                    {{ number_format($item->tax_rate, 2, ',', ' ') }} %
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                                    {{ number_format($item->discount_rate, 2, ',', ' ') }} %
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    {{ number_format($item->total_price, 2, ',', ' ') }} €
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Total -->
            <div class="border-t pt-4">
                <div class="flex justify-end">
                    <div class="w-64">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Total HT:</span>
                            <span class="font-medium">{{ number_format($invoice->total_amount / (1 + 0.20), 2, ',', ' ') }} €</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">TVA (20%):</span>
                            <span class="font-medium">{{ number_format($invoice->total_amount - ($invoice->total_amount / (1 + 0.20)), 2, ',', ' ') }} €</span>
                        </div>
                        <div class="flex justify-between text-lg font-bold border-t pt-2">
                            <span>Total TTC:</span>
                            <span>{{ number_format($invoice->total_amount, 2, ',', ' ') }} €</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mentions légales -->
            <div class="border-t pt-4 mt-8 text-sm text-gray-600">
                <p class="mb-2">TVA non applicable, article 293 B du CGI.</p>
                <p>Paiement à réception de facture. Passé ce délai, pénalités de retard au taux annuel de 10%.</p>
            </div>
        </div>
    </div>
</div>
@endsection