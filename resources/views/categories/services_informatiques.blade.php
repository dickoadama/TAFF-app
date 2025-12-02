@extends('layouts.app')

@section('content')
<div class="page-background bg-informatique">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-12 text-white animate__animated animate__fadeInDown">
            Services Informatiques
        </h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Carte Assistance Informatique -->
            <div class="card animated-card category-informatique rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/informatique.jpg') }}" alt="Services informatiques" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Assistance Informatique</h2>
                <p class="mb-4">Support technique à distance et sur site pour particuliers et professionnels.</p>
                <a href="#" class="btn-primary inline-block">Demander une intervention</a>
            </div>
            
            <!-- Carte Installation Réseaux -->
            <div class="card animated-card category-informatique rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/informatique.jpg') }}" alt="Services informatiques" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Installation Réseaux</h2>
                <p class="mb-4">Configuration et déploiement de réseaux locaux, Wi-Fi et fibre.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Sauvegarde & Stockage -->
            <div class="card animated-card category-informatique rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/informatique.jpg') }}" alt="Services informatiques" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Sauvegarde & Stockage</h2>
                <p class="mb-4">Solutions de stockage cloud et NAS pour la sauvegarde de vos données.</p>
                <a href="#" class="btn-primary inline-block">Demander une solution</a>
            </div>
            
            <!-- Carte Maintenance Préventive -->
            <div class="card animated-card category-informatique rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/informatique.jpg') }}" alt="Services informatiques" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Maintenance Préventive</h2>
                <p class="mb-4">Contrats de maintenance pour la mise à jour et l'optimisation de vos systèmes.</p>
                <a href="#" class="btn-primary inline-block">Souscrire un contrat</a>
            </div>
            
            <!-- Carte Développement Web -->
            <div class="card animated-card category-informatique rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/informatique.jpg') }}" alt="Services informatiques" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Développement Web</h2>
                <p class="mb-4">Création de sites web, applications web et portails sur mesure.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Sécurité Informatique -->
            <div class="card animated-card category-informatique rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/informatique.jpg') }}" alt="Services informatiques" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Sécurité Informatique</h2>
                <p class="mb-4">Protection antivirus, pare-feu et audits de sécurité des systèmes.</p>
                <a href="#" class="btn-primary inline-block">Demander un audit</a>
            </div>
        </div>
    </div>
</div>
@endsection