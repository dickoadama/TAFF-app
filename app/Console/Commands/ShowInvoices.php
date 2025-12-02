<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invoice;

class ShowInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:show';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show all invoices with their operation types';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $invoices = Invoice::all();
        
        if ($invoices->isEmpty()) {
            $this->info('Aucune facture trouvée.');
            return Command::SUCCESS;
        }
        
        $this->table(
            ['ID', 'Numéro', 'Type d\'opération', 'Statut crédit', 'Statut avoir', 'Client'],
            $invoices->map(function ($invoice) {
                return [
                    $invoice->id,
                    $invoice->invoice_number,
                    $invoice->operation_type,
                    $invoice->credit_status ?? 'N/A',
                    $invoice->refund_status ?? 'N/A',
                    $invoice->client_full_name,
                ];
            })->toArray()
        );
        
        return Command::SUCCESS;
    }
}