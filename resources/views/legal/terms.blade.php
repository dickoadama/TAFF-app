@extends('layouts.app')

@section('title', 'Conditions d\'utilisation')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white bg-opacity-90 backdrop-blur-lg rounded-2xl shadow-xl overflow-hidden">
        <div class="bg-gradient-to-r from-blue-700 to-indigo-800 py-6 px-8">
            <h1 class="text-3xl font-bold text-white text-center">Conditions d'utilisation</h1>
        </div>
        
        <div class="p-8">
            <div class="prose prose-blue max-w-none">
                <p class="text-gray-700 mb-6">
                    Bienvenue sur TAFF.APP. En accédant à ce site web, vous acceptez d'être lié par les présentes conditions d'utilisation, 
                    toutes les lois et réglementations applicables. Si vous n'acceptez pas ces conditions, veuillez ne pas utiliser ce site.
                </p>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">1. Utilisation du site</h2>
                <p class="text-gray-700 mb-4">
                    Le contenu de ce site web est fourni uniquement à titre informatif. Vous vous engagez à utiliser ce site 
                    conformément à toutes les lois et réglementations applicables dans votre juridiction.
                </p>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">2. Propriété intellectuelle</h2>
                <p class="text-gray-700 mb-4">
                    Sauf indication contraire, TAFF.APP et ses concédants détiennent les droits de propriété intellectuelle 
                    pour tout le matériel présent sur ce site web. Tous les droits de propriété intellectuelle sont réservés.
                </p>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">3. Limitations de responsabilité</h2>
                <p class="text-gray-700 mb-4">
                    TAFF.APP ne saurait être tenu responsable des dommages directs, indirects, spéciaux ou consécutifs 
                    découlant de l'utilisation de ce site web ou de l'impossibilité de l'utiliser.
                </p>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">4. Modifications des conditions</h2>
                <p class="text-gray-700 mb-4">
                    TAFF.APP se réserve le droit de modifier ces conditions d'utilisation à tout moment. 
                    Les modifications prendront effet immédiatement après leur publication sur le site.
                </p>
                
                <h2 class="text-2xl font-bold text-blue-800 mt-8 mb-4">5. Loi applicable</h2>
                <p class="text-gray-700 mb-4">
                    Ces conditions sont régies par les lois de la Côte d'Ivoire et vous vous soumettez irrévocablement 
                    à la juridiction exclusive des tribunaux de ce pays.
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