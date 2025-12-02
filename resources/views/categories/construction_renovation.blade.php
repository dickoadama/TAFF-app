@extends('layouts.app')

@section('content')
<div class="page-background bg-btp">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-12 text-white animate__animated animate__fadeInDown">
            Construction & Rénovation
        </h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Carte Construction Neuve -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/construction_renovation.jpg') }}" alt="Construction et rénovation" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Construction Neuve</h2>
                <p class="mb-4">Construction de maisons, immeubles et bâtiments sur mesure.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Rénovation Intérieure -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/construction_renovation.jpg') }}" alt="Construction et rénovation" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Rénovation Intérieure</h2>
                <p class="mb-4">Rénovation complète d'intérieurs : sols, murs, plafonds, menuiseries.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Rénovation Extérieure -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/construction_renovation.jpg') }}" alt="Construction et rénovation" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Rénovation Extérieure</h2>
                <p class="mb-4">Ravalement de façades, toitures, isolation thermique et étanchéité.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Extensions -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/construction_renovation.jpg') }}" alt="Construction et rénovation" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Extensions & Surélévation</h2>
                <p class="mb-4">Ajout d'étages, combles aménageables, extensions de maisons.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Aménagement Combles -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/construction_renovation.jpg') }}" alt="Construction et rénovation" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Aménagement Combles</h2>
                <p class="mb-4">Transformation de combles en espaces de vie habitables.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Installation Cuisine/Salle de bain -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/construction_renovation.jpg') }}" alt="Construction et rénovation" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Installation Cuisine/SDB</h2>
                <p class="mb-4">Aménagement et installation complète de cuisines et salles de bain.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
        </div>
    </div>
</div>
@endsection