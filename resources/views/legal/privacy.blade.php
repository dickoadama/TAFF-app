@extends('layouts.app')

@section('title', 'Politique de confidentialité')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white bg-opacity-90 backdrop-blur-lg rounded-2xl shadow-xl overflow-hidden">
        <div class="bg-gradient-to-r from-blue-700 to-indigo-800 py-6 px-8">
            <h1 class="text-3xl font-bold text-white text-center">Politique de confidentialité</h1>
        </div>
        
        <div class="p-8">
            <div class="prose prose-blue max-w-none">
                <p class="text-gray-700 mb-6">
                    Chez TAFF.APP, nous nous engageons à protéger votre vie privée. Cette politique de confidentialité 
                    explique comment nous collectons, utilisons, divulguons et protégeons vos informations personnelles.
                </p>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">1. Informations que nous collectons</h2>
                <p class="text-gray-700 mb-4">
                    Nous pouvons collecter les informations suivantes :
                </p>
                <ul class="list-disc pl-8 text-gray-700 mb-4">
                    <li>Informations d'identification personnelles (nom, adresse e-mail, numéro de téléphone)</li>
                    <li>Informations de profil (préférences, centres d'intérêt)</li>
                    <li>Données d'utilisation (adresse IP, type de navigateur, pages visitées)</li>
                    <li>Informations relatives aux transactions (demandes de service, devis, paiements)</li>
                </ul>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">2. Utilisation des informations</h2>
                <p class="text-gray-700 mb-4">
                    Nous utilisons vos informations pour :
                </p>
                <ul class="list-disc pl-8 text-gray-700 mb-4">
                    <li>Fournir, maintenir et améliorer nos services</li>
                    <li>Vous contacter concernant vos demandes de service</li>
                    <li>Vous envoyer des informations techniques et de support</li>
                    <li>Prévenir et détecter les fraudes</li>
                    <li>Respecter les obligations légales</li>
                </ul>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">3. Protection des informations</h2>
                <p class="text-gray-700 mb-4">
                    Nous mettons en œuvre diverses mesures de sécurité pour protéger vos informations personnelles 
                    contre l'accès non autorisé, l'utilisation abusive ou la divulgation.
                </p>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">4. Partage des informations</h2>
                <p class="text-gray-700 mb-4">
                    Nous ne vendons, n'échangeons ni ne louons vos informations personnelles à des tiers. 
                    Nous pouvons partager des informations avec des prestataires de services de confiance 
                    qui nous aident à exploiter notre site web.
                </p>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">5. Cookies</h2>
                <p class="text-gray-700 mb-4">
                    Notre site peut utiliser des cookies pour améliorer l'expérience utilisateur. 
                    Vous pouvez choisir de désactiver tous les cookies dans les paramètres de votre navigateur.
                </p>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">6. Consentement</h2>
                <p class="text-gray-700 mb-4">
                    En utilisant notre site, vous consentez à notre politique de confidentialité.
                </p>
                
                <div class="mt-10 pt-6 border-t border-gray-200">
                    <p class="text-gray-600 text-sm">
                        Dernière mise à jour : {{ date('d/m/Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection