@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="card">
        <div class="card-header">
            <h1>Détails de l'artisan</h1>
        </div>
        <div class="card-body">
            <p class="text-gray-600 mb-6">
                Informations détaillées sur l'artisan {{ $artisan->name }}.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Informations personnelles</h2>
                    </div>
                    <div class="card-body">
                        <div class="space-y-3">
                            <div class="flex">
                                <span class="font-medium w-32">Nom:</span>
                                <span>{{ $artisan->name }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium w-32">Email:</span>
                                <span>{{ $artisan->email }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium w-32">Téléphone:</span>
                                <span>{{ $artisan->phone ?? 'Non renseigné' }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium w-32">Adresse:</span>
                                <span>{{ $artisan->address ?? 'Non renseignée' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h2>Compétences et description</h2>
                    </div>
                    <div class="card-body">
                        <div class="space-y-3">
                            <div class="flex">
                                <span class="font-medium w-32">Catégorie:</span>
                                <span>{{ $artisan->serviceCategory->name }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium w-32">Compétences:</span>
                                <span>{{ $artisan->skills ?? 'Non renseignées' }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium w-32">Description:</span>
                                <span>{{ $artisan->description ?? 'Non renseignée' }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium w-32">Note moyenne:</span>
                                <span>
                                    <span class="font-bold text-lg">{{ $artisan->rating }}</span>/5 
                                    <span class="text-gray-500">({{ $artisan->review_count }} avis)</span>
                                </span>
                            </div>
                            <div class="flex">
                                <span class="font-medium w-32">Disponible:</span>
                                <span>
                                    @if($artisan->available)
                                        <span class="text-success">Oui</span>
                                    @else
                                        <span class="text-danger">Non</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card bg-light border-0">
                <div class="card-body">
                    <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                        <h3 class="text-lg font-medium">Actions</h3>
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('service-requests.create', ['artisan_id' => $artisan->id]) }}" class="btn-success">
                                Commander ses services
                            </a>
                            <a href="{{ route('artisans.edit', $artisan) }}" class="btn-accent">
                                Modifier
                            </a>
                            <form action="{{ route('artisans.destroy', $artisan) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet artisan ?')">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection