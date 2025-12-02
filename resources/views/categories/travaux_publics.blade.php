@extends('layouts.app')

@section('content')
<div class="page-background bg-btp">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-12 text-white animate__animated animate__fadeInDown">
            Travaux Publics
        </h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Carte VRD -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/travaux_publics.jpg') }}" alt="Travaux publics" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">VRD (Voirie, Réseaux Divers)</h2>
                <p class="mb-4">Aménagement de voirie, réseaux d'eau, d'électricité, d'assainissement.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Terrassement -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/travaux_publics.jpg') }}" alt="Travaux publics" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Terrassement</h2>
                <p class="mb-4">Déblaiement, remblaiement, nivellement et préparation de terrains.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Génie Civil -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/travaux_publics.jpg') }}" alt="Travaux publics" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Génie Civil</h2>
                <p class="mb-4">Construction d'ouvrages publics : ponts, tunnels, barrages, stades.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Aménagement Extérieur -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/travaux_publics.jpg') }}" alt="Travaux publics" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Aménagement Extérieur</h2>
                <p class="mb-4">Création de parcs, jardins, espaces verts et aménagements paysagers.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Assainissement -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/travaux_publics.jpg') }}" alt="Travaux publics" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Assainissement</h2>
                <p class="mb-4">Installation de réseaux d'assainissement et stations d'épuration.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Ponts et Ouvrages d'Art -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/travaux_publics.jpg') }}" alt="Travaux publics" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Ponts et Ouvrages d'Art</h2>
                <p class="mb-4">Conception et construction de ponts, viaducs et passerelles.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
        </div>
    </div>
</div>
@endsection