@extends('layouts.app')

@section('content')
<div class="page-background bg-application">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-12 text-gray-800 animate__animated animate__fadeInDown">
            Applications & Sites Internet
        </h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Carte Développement Web -->
            <div class="card animated-card category-application rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/applications.jpg') }}" alt="Applications" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Développement Web</h2>
                <p class="mb-4">Création de sites web sur mesure, e-commerce et applications web.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Applications Mobiles -->
            <div class="card animated-card category-application rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/applications.jpg') }}" alt="Applications" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Applications Mobiles</h2>
                <p class="mb-4">Développement d'applications iOS et Android pour smartphones et tablettes.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Refonte de Site -->
            <div class="card animated-card category-site-internet rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/applications.jpg') }}" alt="Applications" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Refonte de Site</h2>
                <p class="mb-4">Modernisation et optimisation de sites web existants.</p>
                <a href="#" class="btn-primary inline-block">Demander une refonte</a>
            </div>
            
            <!-- Carte SEO -->
            <div class="card animated-card category-site-internet rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/applications.jpg') }}" alt="Applications" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Référencement SEO</h2>
                <p class="mb-4">Optimisation pour les moteurs de recherche et amélioration du trafic.</p>
                <a href="#" class="btn-primary inline-block">Améliorer mon référencement</a>
            </div>
            
            <!-- Carte E-commerce -->
            <div class="card animated-card category-application rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/applications.jpg') }}" alt="Applications" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Boutique en Ligne</h2>
                <p class="mb-4">Création de boutiques en ligne avec système de paiement sécurisé.</p>
                <a href="#" class="btn-primary inline-block">Créer ma boutique</a>
            </div>
            
            <!-- Carte Maintenance Web -->
            <div class="card animated-card category-site-internet rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/applications.jpg') }}" alt="Applications" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Maintenance Web</h2>
                <p class="mb-4">Maintenance et mises à jour régulières de vos sites et applications.</p>
                <a href="#" class="btn-primary inline-block">Souscrire une maintenance</a>
            </div>
        </div>
    </div>
</div>
@endsection