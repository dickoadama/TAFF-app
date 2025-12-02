<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_categories')->insert([
            [
                'name' => 'Travaux publics',
                'description' => 'Travaux d\'infrastructure et de voirie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Construction & Rénovation',
                'description' => 'Bâtiment neuf et rénovation',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Services informatiques',
                'description' => 'Développement, maintenance et support informatique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}