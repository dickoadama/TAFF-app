<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Artisan;
use App\Models\ServiceRequest;
use App\Models\Quote;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\InvoiceItem;

class CreateTestInvoiceTypes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoices:create-test-types';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create test invoices with different types';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Créer un utilisateur de test
        $user = User::create([
            'name' => 'Client Test',
            'email' => 'client' . time() . '@test.com',
            'password' => bcrypt('password'),
            'address' => '123 Rue du Test, 75000 Paris'
        ]);

        // Créer un artisan de test
        $artisan = Artisan::create([
            'name' => 'Artisan Test',
            'email' => 'artisan' . time() . '@test.com',
            'phone' => '01 23 45 67 89',
            'service_category_id' => 1
        ]);

        // Créer une demande de service de test
        $serviceRequest = ServiceRequest::create([
            'user_id' => $user->id,
            'title' => 'Demande de test',
            'description' => 'Description de la demande de test',
            'service_category_id' => 1
        ]);

        // Créer un devis de test
        $quote = Quote::create([
            'service_request_id' => $serviceRequest->id,
            'artisan_id' => $artisan->id,
            'amount' => 1000.00,
            'description' => 'Devis de test'
        ]);

        // Créer une facture normale (devis/achat)
        $invoice1 = Invoice::create([
            'quote_id' => $quote->id,
            'user_id' => $user->id,
            'artisan_id' => $artisan->id,
            'type' => 'invoice',
            'client_full_name' => 'Jean Dupont',
            'client_contact' => 'jean.dupont@email.com - 06 12 34 56 78',
            'invoice_number' => 'FAC-' . time() . '-1',
            'issued_date' => now(),
            'due_date' => now()->addDays(30),
            'status' => 'pending'
        ]);

        // Créer une facture de crédit sortant
        $invoice2 = Invoice::create([
            'quote_id' => $quote->id,
            'user_id' => $user->id,
            'artisan_id' => $artisan->id,
            'type' => 'credit',
            'credit_type' => 'outgoing',
            'client_full_name' => 'Marie Martin',
            'client_contact' => 'marie.martin@email.com - 06 98 76 54 32',
            'invoice_number' => 'FAC-' . time() . '-2',
            'issued_date' => now(),
            'due_date' => now()->addDays(30),
            'status' => 'pending'
        ]);

        // Créer une facture d'avoir
        $invoice3 = Invoice::create([
            'quote_id' => $quote->id,
            'user_id' => $user->id,
            'artisan_id' => $artisan->id,
            'type' => 'refund',
            'refund_type' => 'refund',
            'client_full_name' => 'Pierre Durand',
            'client_contact' => 'pierre.durand@email.com - 06 55 44 33 22',
            'invoice_number' => 'FAC-' . time() . '-3',
            'issued_date' => now(),
            'due_date' => now()->addDays(30),
            'status' => 'pending'
        ]);

        // Obtenir quelques produits existants
        $products = Product::take(2)->get();

        // Créer des lignes de facture pour chaque facture
        foreach ([$invoice1, $invoice2, $invoice3] as $index => $invoice) {
            foreach ($products as $productIndex => $product) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $product->id,
                    'quantity' => $productIndex + 1,
                    'unit_price' => $product->price_ht,
                    'tax_rate' => $product->tax_rate,
                    'discount_rate' => 5.00,
                    'description' => 'Description pour ' . $product->name
                ]);
            }
        }

        $this->info('Test invoices with different types created successfully!');
        $this->info('Normal invoice ID: ' . $invoice1->id);
        $this->info('Credit invoice ID: ' . $invoice2->id);
        $this->info('Refund invoice ID: ' . $invoice3->id);

        return Command::SUCCESS;
    }
}