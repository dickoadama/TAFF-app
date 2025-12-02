<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class CreateTestProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:create-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create test products for the application';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $products = [
            [
                'name' => 'Matériel de construction',
                'description' => 'Briques, ciment, sable et autres matériaux de construction',
                'price_ht' => 1500.00,
                'tax_rate' => 20.00
            ],
            [
                'name' => 'Service de plomberie',
                'description' => 'Intervention d\'urgence pour réparation de fuites',
                'price_ht' => 85.50,
                'tax_rate' => 10.00
            ],
            [
                'name' => 'Installation électrique',
                'description' => 'Pose de tableau électrique et installation de prises',
                'price_ht' => 250.75,
                'tax_rate' => 20.00
            ],
            [
                'name' => 'Peinture intérieure',
                'description' => 'Peinture murale avec finition mate',
                'price_ht' => 45.90,
                'tax_rate' => 5.50
            ],
            [
                'name' => 'Nettoyage de vitres',
                'description' => 'Nettoyage professionnel de surfaces vitrées',
                'price_ht' => 120.00,
                'tax_rate' => 20.00
            ]
        ];

        foreach ($products as $productData) {
            Product::firstOrCreate(
                ['name' => $productData['name']],
                $productData
            );
        }

        $this->info('Test products created successfully!');

        return Command::SUCCESS;
    }
}
