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
            
            <!-- Portfolio de l'artisan -->
            <div class="card mb-6 animate__animated animate__fadeInUp">
                <div class="card-header flex justify-between items-center">
                    <h2>Portfolio</h2>
                    <a href="{{ route('artisans.works.index', $artisan) }}" class="btn-primary text-sm animate__animated animate__fadeIn animate__delay-0.3s">
                        <i class="fas fa-eye mr-2"></i>Voir tout le portfolio
                    </a>
                </div>
                <div class="card-body">
                    @if($artisan->works->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach($artisan->works->take(3) as $work)
                        <div class="border rounded-lg overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1 animate__animated animate__fadeIn animate__delay-{{ ($loop->index + 1) * 200 }}ms">
                            @if($work->image_path)
                            <img src="{{ asset('storage/' . $work->image_path) }}" alt="{{ $work->title }}" class="w-full h-32 object-cover transition-transform duration-500 hover:scale-110">
                            @else
                            <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-32 flex items-center justify-center transition-all duration-300 hover:bg-gray-300">
                                <i class="fas fa-image text-2xl text-gray-400"></i>
                            </div>
                            @endif
                            <div class="p-3">
                                <h3 class="font-medium text-gray-800 truncate transition-colors duration-300 hover:text-primary">{{ $work->title }}</h3>
                                @if($work->category)
                                <p class="text-xs text-gray-500 transition-all duration-300 hover:text-gray-700">{{ $work->category }}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-gray-500 text-center py-4 animate__animated animate__fadeIn animate__delay-0.3s">Aucune réalisation disponible pour le moment.</p>
                    @endif
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