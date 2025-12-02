<?php

use App\Models\User;
use App\Models\Artisan;
use App\Models\ServiceRequest;
use App\Models\Quote;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\InvoiceItem;

// Créer un utilisateur de test
$user = User::factory()->create([
    'name' => 'Client Test',
    'email' => 'client@test.com',
    'address' => '123 Rue du Test, 75000 Paris'
]);

// Créer un artisan de test
$artisan = Artisan::factory()->create([
    'name' => 'Artisan Test',
    'email' => 'artisan@test.com',
    'phone' => '01 23 45 67 89'
]);

// Créer une demande de service de test
$serviceRequest = ServiceRequest::factory()->create([
    'user_id' => $user->id,
    'title' => 'Demande de test',
    'description' => 'Description de la demande de test'
]);

// Créer un devis de test
$quote = Quote::create([
    'service_request_id' => $serviceRequest->id,
    'artisan_id' => $artisan->id,
    'amount' => 1000.00,
    'description' => 'Devis de test'
]);

// Créer une facture de test avec plusieurs produits
$invoice = Invoice::create([
    'quote_id' => $quote->id,
    'user_id' => $user->id,
    'artisan_id' => $artisan->id,
    'invoice_number' => 'FAC-001',
    'issued_date' => now(),
    'due_date' => now()->addDays(30),
    'status' => 'pending'
]);

// Obtenir quelques produits existants
$products = Product::take(3)->get();

// Créer des lignes de facture
foreach ($products as $index => $product) {
    InvoiceItem::create([
        'invoice_id' => $invoice->id,
        'product_id' => $product->id,
        'quantity' => $index + 1,
        'unit_price' => $product->price_ht,
        'tax_rate' => $product->tax_rate,
        'discount_rate' => 5.00,
        'description' => 'Description pour ' . $product->name
    ]);
}

echo "Test terminé avec succès !\n";
echo "Facture créée avec ID: " . $invoice->id . "\n";
echo "Nombre de lignes de facture: " . $invoice->items->count() . "\n";
echo "Montant total TTC: " . number_format($invoice->total_amount, 2) . " €\n";