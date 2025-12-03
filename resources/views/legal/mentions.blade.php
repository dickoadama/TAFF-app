@extends('layouts.app')

@section('title', 'Mentions légales')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white bg-opacity-90 backdrop-blur-lg rounded-2xl shadow-xl overflow-hidden">
        <div class="bg-gradient-to-r from-blue-700 to-indigo-800 py-6 px-8">
            <h1 class="text-3xl font-bold text-white text-center">Mentions légales</h1>
        </div>
        
        <div class="p-8">
            <div class="prose prose-blue max-w-none">
                <h2 class="text-2xl font-bold text-blue-800 mt-4 mb-4">1. Éditeur du site</h2>
                <p class="text-gray-700 mb-4">
                    <strong>Raison sociale :</strong> TAFF.APP<br>
                    <strong>Siège social :</strong> Abidjan, Côte d'Ivoire<br>
                    <strong>Directeur de la publication :</strong> Adama DICKO<br>
                    <strong>Contact :</strong> dickoadama08@gmail.com
                </p>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">2. Hébergeur</h2>
                <p class="text-gray-700 mb-4">
                    <strong>Nom de l'hébergeur :</strong> [À compléter]<br>
                    <strong>Adresse :</strong> [À compléter]<br>
                    <strong>Contact :</strong> [À compléter]
                </p>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">3. Propriété intellectuelle</h2>
                <p class="text-gray-700 mb-4">
                    L'ensemble de ce site relève de la législation internationale sur le droit d'auteur 
                    et de la propriété intellectuelle. Tous les droits de reproduction sont réservés.
                </p>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">4. Collecte de données</h2>
                <p class="text-gray-700 mb-4">
                    Conformément à la loi n°78-17 du 6 janvier 1978 relative à l'informatique, 
                    aux fichiers et aux libertés, vous disposez d'un droit d'accès, de rectification 
                    et d'opposition aux données personnelles vous concernant.
                </p>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">5. Cookies</h2>
                <p class="text-gray-700 mb-4">
                    Ce site utilise des cookies pour améliorer l'expérience utilisateur. 
                    Vous pouvez désactiver les cookies dans les paramètres de votre navigateur.
                </p>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">6. Responsabilités</h2>
                <p class="text-gray-700 mb-4">
                    L'utilisateur s'engage à ne pas perturber le bon fonctionnement de ce site. 
                    En cas de dommage causé par l'utilisation du site, TAFF.APP ne saurait être tenu responsable.
                </p>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">7. Droit applicable</h2>
                <p class="text-gray-700 mb-4">
                    Les présentes mentions légales sont régies par le droit ivoirien. 
                    En cas de litige, les tribunaux de Côte d'Ivoire seront seuls compétents.
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