@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="card">
        <div class="card-header">
            <h1 class="text-3xl font-bold text-gray-800">Le Profil de l'Artisan</h1>
        </div>
        <div class="card-body">
            <p class="text-gray-600 mb-6">
                Un artisan est un professionnel qui maîtrise un métier manuel, transforme des matières premières en produits finis, répare ou offre des services, et qui est juridiquement défini comme un chef d'entreprise indépendant.
            </p>
            
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Caractéristiques du Profil</h2>
                <p class="text-gray-600 mb-4">
                    Son profil combine savoir-faire technique, compétences manuelles et créatives, sens de la rigueur, relationnel client, et gestion de son entreprise. L'inscription au registre national des entreprises (RNE) et la qualification professionnelle sont obligatoires pour obtenir le statut d'artisan.
                </p>
            </div>
            
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Compétences et Qualités</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="font-bold text-lg text-blue-600"><i class="fas fa-tools mr-2"></i>Savoir-faire technique et manuel</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-gray-600">
                                Maîtrise des techniques de production, de transformation ou de réparation de son métier.
                            </p>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="font-bold text-lg text-green-600"><i class="fas fa-lightbulb mr-2"></i>Créativité et inventivité</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-gray-600">
                                Capacité à concevoir et fabriquer des objets uniques, en privilégiant la qualité sur la quantité.
                            </p>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="font-bold text-lg text-yellow-600"><i class="fas fa-clipboard-check mr-2"></i>Rigueur</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-gray-600">
                                Essentielle pour la qualité du travail et la gestion quotidienne.
                            </p>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="font-bold text-lg text-purple-600"><i class="fas fa-sync-alt mr-2"></i>Adaptabilité</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-gray-600">
                                Ouverture aux nouvelles technologies, à la formation continue et aux méthodes innovantes.
                            </p>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="font-bold text-lg text-red-600"><i class="fas fa-chart-line mr-2"></i>Gestion d'entreprise</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-gray-600">
                                Responsabilité de la production, de la commercialisation et de la gestion administrative et financière.
                            </p>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="font-bold text-lg text-indigo-600"><i class="fas fa-users mr-2"></i>Relationnel</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-gray-600">
                                Aptitude à interagir avec les clients, à les fidéliser et à travailler en équipe si nécessaire.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Statut et Obligations</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="font-bold text-lg text-blue-600"><i class="fas fa-gavel mr-2"></i>Statut juridique</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-gray-600">
                                Chef d'entreprise indépendant.
                            </p>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="font-bold text-lg text-green-600"><i class="fas fa-file-contract mr-2"></i>Enregistrement</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-gray-600">
                                Immatriculation obligatoire au Registre national des entreprises (RNE).
                            </p>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="font-bold text-lg text-yellow-600"><i class="fas fa-graduation-cap mr-2"></i>Qualification professionnelle</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-gray-600">
                                Obligation de détenir un diplôme, un titre homologué ou de justifier d'une expérience professionnelle significative (souvent 3 ans).
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Rôle et Environnement</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="font-bold text-lg text-blue-600"><i class="fas fa-user mr-2"></i>Indépendance</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-gray-600">
                                Travaille pour son propre compte et n'est pas salarié d'une autre entreprise.
                            </p>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="font-bold text-lg text-green-600"><i class="fas fa-map-marker-alt mr-2"></i>Dimension locale</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-gray-600">
                                Souvent intégré au tissu social et à la vie locale, travaillant dans un contexte de proximité avec ses clients.
                            </p>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="font-bold text-lg text-purple-600"><i class="fas fa-euro-sign mr-2"></i>Contribution économique</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-gray-600">
                                Participe à l'économie locale, nationale et internationale en créant emplois et richesse.
                            </p>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="font-bold text-lg text-red-600"><i class="fas fa-briefcase mr-2"></i>Diversité des métiers</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-gray-600">
                                Le secteur couvre plus de 250 métiers, allant de l'artisanat traditionnel (menuisier, boulanger, coiffeur) à des spécialités plus pointues (céramiste, ébéniste, luthier).
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection