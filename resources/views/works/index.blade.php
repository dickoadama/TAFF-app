@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="card">
        <div class="card-header">
            <h1 class="text-3xl font-bold text-gray-800">Nos Œuvres</h1>
        </div>
        <div class="card-body">
            <p class="text-gray-600 mb-6">
                Découvrez nos réalisations et projets accomplis avec succès.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Exemple d'œuvre 1 -->
                <div class="card">
                    <div class="card-header">
                        <img src="https://via.placeholder.com/400x250" alt="Projet de rénovation" class="w-full h-48 object-cover rounded-t-lg">
                    </div>
                    <div class="card-body">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Rénovation complète d'un immeuble</h3>
                        <p class="text-gray-600 mb-4">Rénovation complète d'un immeuble de 5 étages dans le centre-ville d'Abidjan, incluant la mise aux normes électriques et plomberie.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">Construction</span>
                            <span class="text-gray-500 text-sm">Terminé en 2024</span>
                        </div>
                    </div>
                </div>
                
                <!-- Exemple d'œuvre 2 -->
                <div class="card">
                    <div class="card-header">
                        <img src="https://via.placeholder.com/400x250" alt="Installation électrique" class="w-full h-48 object-cover rounded-t-lg">
                    </div>
                    <div class="card-body">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Installation électrique industrielle</h3>
                        <p class="text-gray-600 mb-4">Installation complète du système électrique pour une usine de transformation alimentaire de 2000m².</p>
                        <div class="flex justify-between items-center">
                            <span class="text-green-600 font-medium">Électricité</span>
                            <span class="text-gray-500 text-sm">Terminé en 2023</span>
                        </div>
                    </div>
                </div>
                
                <!-- Exemple d'œuvre 3 -->
                <div class="card">
                    <div class="card-header">
                        <img src="https://via.placeholder.com/400x250" alt="Projet de plomberie" class="w-full h-48 object-cover rounded-t-lg">
                    </div>
                    <div class="card-body">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Système de plomberie hospitalier</h3>
                        <p class="text-gray-600 mb-4">Installation d'un système de plomberie sanitaire pour un hôpital de 300 lits, respectant les normes médicales strictes.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-purple-600 font-medium">Plomberie</span>
                            <span class="text-gray-500 text-sm">Terminé en 2023</span>
                        </div>
                    </div>
                </div>
                
                <!-- Exemple d'œuvre 4 -->
                <div class="card">
                    <div class="card-header">
                        <img src="https://via.placeholder.com/400x250" alt="Projet de menuiserie" class="w-full h-48 object-cover rounded-t-lg">
                    </div>
                    <div class="card-body">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Menuiserie sur mesure</h3>
                        <p class="text-gray-600 mb-4">Fabrication et installation de meubles sur mesure pour un hôtel 5 étoiles à Bingerville.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-amber-600 font-medium">Menuiserie</span>
                            <span class="text-gray-500 text-sm">Terminé en 2024</span>
                        </div>
                    </div>
                </div>
                
                <!-- Exemple d'œuvre 5 -->
                <div class="card">
                    <div class="card-header">
                        <img src="https://via.placeholder.com/400x250" alt="Projet de peinture" class="w-full h-48 object-cover rounded-t-lg">
                    </div>
                    <div class="card-body">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Peinture artistique</h3>
                        <p class="text-gray-600 mb-4">Réalisation de fresques murales pour la décoration intérieure d'un restaurant gastronomique.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-red-600 font-medium">Peinture</span>
                            <span class="text-gray-500 text-sm">Terminé en 2024</span>
                        </div>
                    </div>
                </div>
                
                <!-- Exemple d'œuvre 6 -->
                <div class="card">
                    <div class="card-header">
                        <img src="https://via.placeholder.com/400x250" alt="Projet de jardinage" class="w-full h-48 object-cover rounded-t-lg">
                    </div>
                    <div class="card-body">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Aménagement paysager</h3>
                        <p class="text-gray-600 mb-4">Création d'un jardin paysager pour une villa privée avec piscine et espaces de détente.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-teal-600 font-medium">Jardinage</span>
                            <span class="text-gray-500 text-sm">Terminé en 2023</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 text-center">
                <a href="{{ route('home') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <i class="fas fa-arrow-left mr-2"></i>Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection