<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invoice;
use App\Models\Product;

class TestInvoiceCreation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:test-create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test invoice creation with automatic invoice number generation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Vérifier s'il y a des produits
        if (Product::count() == 0) {
            $this->error('Aucun produit trouvé. Veuillez créer des produits avant de créer une facture.');
            return Command::FAILURE;
        }
        
        // Créer une facture de test pour vérifier la génération automatique du numéro
        $invoice = Invoice::create([
            'operation_type' => 'purchase',
            'client_full_name' => 'Jean Dupont',
            'client_contact' => 'jean.dupont@email.com',
            'issued_date' => '2025-12-01',
            'due_date' => '2025-12-31',
            'status' => 'pending',
        ]);
        
        $this->info("Facture créée avec le numéro: " . $invoice->invoice_number);
        $this->info("Détails: Date=" . $invoice->issued_date->format('Ymd') . ", Nom=JD, Contact=" . substr(preg_replace('/[^0-9]/', '', $invoice->client_contact), -4));
        
        return Command::SUCCESS;
    }
}