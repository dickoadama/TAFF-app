@extends('layouts.app')

@section('content')
<div class="page-background bg-informatique">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-12 text-white animate__animated animate__fadeInDown">
            Services Informatiques
        </h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Carte Dépannage -->
            <div class="card animated-card category-informatique rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-informatique rounded-lg mb-4">Informatique</div>
                <h2 class="text-2xl font-bold mb-2">Dépannage Informatique</h2>
                <p class="mb-4">Résolution de problèmes matériels et logiciels pour particuliers et professionnels.</p>
                <a href="#" class="btn-primary inline-block">Demander une intervention</a>
            </div>
            
            <!-- Carte Réseau -->
            <div class="card animated-card category-informatique rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-informatique rounded-lg mb-4">Informatique</div>
                <h2 class="text-2xl font-bold mb-2">Installation Réseau</h2>
                <p class="mb-4">Configuration et installation de réseaux locaux et Wi-Fi.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Sauvegarde -->
            <div class="card animated-card category-informatique rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-informatique rounded-lg mb-4">Informatique</div>
                <h2 class="text-2xl font-bold mb-2">Sauvegarde Données</h2>
                <p class="mb-4">Solutions de sauvegarde et récupération de données.</p>
                <a href="#" class="btn-primary inline-block">Demander une solution</a>
            </div>
            
            <!-- Carte Maintenance -->
            <div class="card animated-card category-informatique rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-informatique rounded-lg mb-4">Informatique</div>
                <h2 class="text-2xl font-bold mb-2">Maintenance Informatique</h2>
                <p class="mb-4">Maintenance préventive et corrective pour parcs informatiques.</p>
                <a href="#" class="btn-primary inline-block">Souscrire un contrat</a>
            </div>
            
            <!-- Carte Développement -->
            <div class="card animated-card category-informatique rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-informatique rounded-lg mb-4">Informatique</div>
                <h2 class="text-2xl font-bold mb-2">Développement Logiciel</h2>
                <p class="mb-4">Création de logiciels sur mesure pour entreprises.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Cybersécurité -->
            <div class="card animated-card category-informatique rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-informatique rounded-lg mb-4">Informatique</div>
                <h2 class="text-2xl font-bold mb-2">Cybersécurité</h2>
                <p class="mb-4">Audit de sécurité et protection des systèmes d'information.</p>
                <a href="#" class="btn-primary inline-block">Demander un audit</a>
            </div>
        </div>
    </div>
</div>
@endsection