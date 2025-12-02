<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtisanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artisans')->insert([
            [
                'name' => 'Artisan Travaux Publics',
                'email' => 'tp@exemple.com',
                'phone' => '01 23 45 67 89',
                'service_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Artisan Construction',
                'email' => 'construction@exemple.com',
                'phone' => '01 23 45 67 90',
                'service_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Artisan Informatique',
                'email' => 'info@exemple.com',
                'phone' => '01 23 45 67 91',
                'service_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}