<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Artisan;
use App\Models\ServiceCategory;
use App\Models\ServiceRequest;
use App\Models\Quote;
use App\Models\Invoice;
use App\Models\Review;

class SeedArtisansWithRealNames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artisans:seed-real-names';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed artisans with real names and their accomplished works';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Désactiver les contraintes de clé étrangère temporairement
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        // Supprimer toutes les données liées aux artisans
        Review::truncate();
        Invoice::truncate();
        Quote::truncate();
        ServiceRequest::truncate();
        Artisan::truncate();
        
        // Réactiver les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        // Récupérer les catégories de service existantes
        $categories = ServiceCategory::all();
        
        if ($categories->isEmpty()) {
            $this->error('Aucune catégorie de service trouvée. Veuillez d\'abord créer des catégories.');
            return Command::FAILURE;
        }
        
        // Données des artisans avec noms propres et œuvres accomplies
        $artisansData = [
            // Artisans du Bâtiment
            [
                'name' => 'Jean Dupont',
                'email' => 'jean.dupont@construction.fr',
                'phone' => '01 23 45 67 89',
                'address' => '15 Rue de la Paix, 75000 Paris',
                'service_category_id' => $categories->firstWhere('name', 'BTP')->id ?? $categories->first()->id,
                'skills' => 'Maçonnerie, Fondations, Rénovation',
                'description' => 'Spécialiste en maçonnerie traditionnelle avec plus de 20 ans d\'expérience. A réalisé la rénovation complète de l\'hôtel de ville de Lyon et la construction du centre commercial de Bordeaux.',
                'rating' => 4.8,
                'review_count' => 42,
                'available' => true
            ],
            [
                'name' => 'Marie Lambert',
                'email' => 'marie.lambert@electricite.fr',
                'phone' => '01 23 45 67 90',
                'address' => '8 Avenue des Champs, 69000 Lyon',
                'service_category_id' => $categories->firstWhere('name', 'BTP')->id ?? $categories->first()->id,
                'skills' => 'Électricité générale, Domotique, Éclairage',
                'description' => 'Électricienne certifiée avec expertise en installations domotiques. A électrifié le musée du Louvre et installé le système d\'éclairage intelligent du stade de France.',
                'rating' => 4.9,
                'review_count' => 38,
                'available' => true
            ],
            [
                'name' => 'Pierre Martin',
                'email' => 'pierre.martin@plomberie.fr',
                'phone' => '01 23 45 67 91',
                'address' => '22 Boulevard Haussmann, 75008 Paris',
                'service_category_id' => $categories->firstWhere('name', 'BTP')->id ?? $categories->first()->id,
                'skills' => 'Plomberie, Chauffage, Sanitaire',
                'description' => 'Plombier chauffagiste avec 15 ans d\'expérience. A installé les systèmes de chauffage du centre Pompidou et rénové les installations sanitaires du château de Versailles.',
                'rating' => 4.7,
                'review_count' => 35,
                'available' => true
            ],
            
            // Artisans des Services
            [
                'name' => 'Sophie Bernard',
                'email' => 'sophie.bernard@coiffure.fr',
                'phone' => '01 23 45 67 92',
                'address' => '5 Rue de Rivoli, 75001 Paris',
                'service_category_id' => $categories->firstWhere('name', 'Services')->id ?? $categories->first()->id,
                'skills' => 'Coiffure, Coloration, Soins capillaires',
                'description' => 'Coiffeuse artistique avec un salon à Saint-Germain-des-Prés. A coiffé les acteurs du film "Amélie Poulain" et a créé les looks pour la Fashion Week de Paris.',
                'rating' => 4.9,
                'review_count' => 56,
                'available' => true
            ],
            [
                'name' => 'Thomas Petit',
                'email' => 'thomas.petit@garage.fr',
                'phone' => '01 23 45 67 93',
                'address' => '34 Avenue de la République, 92000 Nanterre',
                'service_category_id' => $categories->firstWhere('name', 'Services')->id ?? $categories->first()->id,
                'skills' => 'Mécanique automobile, Diagnostic, Réparation',
                'description' => 'Mécanicien automobile spécialisé dans les voitures de luxe. A restauré la collection automobile de François Pinault et entretient les véhicules du Grand Palais.',
                'rating' => 4.8,
                'review_count' => 44,
                'available' => true
            ],
            
            // Artisans de l'Alimentation
            [
                'name' => 'Antoine Moreau',
                'email' => 'antoine.moreau@boulangerie.fr',
                'phone' => '01 23 45 67 94',
                'address' => '12 Rue Montorgueil, 75002 Paris',
                'service_category_id' => $categories->firstWhere('name', 'Alimentation')->id ?? $categories->first()->id,
                'skills' => 'Boulanger, Viennoiserie, Pâtisserie',
                'description' => 'Meilleur Ouvrier de France en boulangerie. Fournit le pain quotidien à l\'Élysée et a créé la baguette signature du restaurant étoilé "Le Cinq".',
                'rating' => 4.9,
                'review_count' => 67,
                'available' => true
            ],
            [
                'name' => 'Claire Dubois',
                'email' => 'claire.dubois@patisserie.fr',
                'phone' => '01 23 45 67 95',
                'address' => '18 Rue du Faubourg Saint-Honoré, 75008 Paris',
                'service_category_id' => $categories->firstWhere('name', 'Alimentation')->id ?? $categories->first()->id,
                'skills' => 'Pâtisserie, Chocolaterie, Confiserie',
                'description' => 'Pâtissière renommée avec une boutique à l\'hôtel de Crillon. A créé le dessert signature du restaurant "L\'Arpège" et a fourni les pâtisseries pour le mariage du prince Harry.',
                'rating' => 5.0,
                'review_count' => 78,
                'available' => true
            ],
            
            // Artisans de la Fabrication
            [
                'name' => 'Luc Rocher',
                'email' => 'luc.rocher@ebeniste.fr',
                'phone' => '01 23 45 67 96',
                'address' => '7 Cour des Comptes, 75005 Paris',
                'service_category_id' => $categories->firstWhere('name', 'Fabrication')->id ?? $categories->first()->id,
                'skills' => 'Ébénisterie, Restauration de meubles, Marqueterie',
                'description' => 'Ébéniste de renom spécialisé dans la restauration de meubles d\'époque. A restauré les meubles du château de Fontainebleau et créé les bibliothèques du musée d\'Orsay.',
                'rating' => 4.9,
                'review_count' => 29,
                'available' => true
            ],
            [
                'name' => 'Isabelle Renault',
                'email' => 'isabelle.renault@potier.fr',
                'phone' => '01 23 45 67 97',
                'address' => '45 Rue de Sèvres, 75007 Paris',
                'service_category_id' => $categories->firstWhere('name', 'Fabrication')->id ?? $categories->first()->id,
                'skills' => 'Céramique, Poterie, Sculpture',
                'description' => 'Potière-céramiste avec un atelier à Montmartre. Ses œuvres sont exposées au musée des Arts décoratifs et elle a créé la vaisselle signature du restaurant "Le Jules Verne".',
                'rating' => 4.8,
                'review_count' => 33,
                'available' => true
            ]
        ];
        
        // Créer les artisans
        foreach ($artisansData as $artisanData) {
            Artisan::create($artisanData);
        }
        
        $this->info('Artisans avec noms propres et œuvres accomplies ont été créés avec succès !');
        $this->info(count($artisansData) . ' artisans ajoutés.');
        
        return Command::SUCCESS;
    }
}