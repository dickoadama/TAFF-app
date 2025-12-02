<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Matériel de construction',
                'description' => 'Brique, ciment, bois, etc.',
                'price_ht' => 1500.00,
                'tax_rate' => 20.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Main d\'œuvre',
                'description' => 'Heures de travail artisans',
                'price_ht' => 800.00,
                'tax_rate' => 10.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Équipement informatique',
                'description' => 'Serveurs, ordinateurs, périphériques',
                'price_ht' => 2500.00,
                'tax_rate' => 20.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}