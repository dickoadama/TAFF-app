<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artisan;
use App\Models\ServiceCategory;

class AddDickoAdamaArtisanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Récupérer la première catégorie de service disponible
        $serviceCategory = ServiceCategory::first();
        
        if (!$serviceCategory) {
            echo "Aucune catégorie de service trouvée. Veuillez d'abord créer des catégories.\n";
            return;
        }
        
        // Créer l'artisan DICKO ADAMA s'il n'existe pas déjà
        $existingArtisan = Artisan::where('name', 'DICKO ADAMA')->first();
        
        if (!$existingArtisan) {
            Artisan::create([
                'name' => 'DICKO ADAMA',
                'email' => 'dicko.adama@example.com',
                'phone' => '01 23 45 67 98',
                'address' => '123 Rue Exemple, 75000 Paris',
                'service_category_id' => $serviceCategory->id,
                'skills' => 'Menuiserie, Ébénisterie, Restauration',
                'description' => 'Artisan menuisier spécialisé dans la restauration de meubles anciens. Avec plus de 15 ans d\'expérience, il a restauré des pièces pour le musée du Louvre et le château de Versailles.',
                'rating' => 5.0,
                'review_count' => 45,
                'available' => true
            ]);
            
            echo "Artisan DICKO ADAMA créé avec succès !\n";
        } else {
            echo "L'artisan DICKO ADAMA existe déjà.\n";
        }
    }
}