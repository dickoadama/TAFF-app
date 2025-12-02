@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h1>Portfolio de {{ $artisan->name }}</h1>
            <a href="{{ route('artisans.works.create', $artisan) }}" class="btn-primary">
                Ajouter une réalisation
            </a>
        </div>
        <div class="card-body">
            <p class="text-gray-600 mb-6">
                Découvrez les réalisations et projets accomplis par {{ $artisan->name }}.
            </p>
            
            @if($works->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($works as $work)
                <div class="card transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="card-header overflow-hidden rounded-t-lg">
                        @if($work->image_path)
                        <img src="{{ asset('storage/' . $work->image_path) }}" alt="{{ $work->title }}" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                        @else
                        <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-48 flex items-center justify-center transition-all duration-300 hover:bg-gray-300">
                            <i class="fas fa-image text-4xl text-gray-400"></i>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h3 class="font-bold text-xl text-gray-800 mb-2 transition-colors duration-300 hover:text-primary">{{ $work->title }}</h3>
                        @if($work->category)
                        <div class="mb-2">
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full transition-all duration-300 hover:bg-blue-200">
                                {{ $work->category }}
                            </span>
                        </div>
                        @endif
                        @if($work->description)
                        <p class="text-gray-600 mb-4">{{ Str::limit($work->description, 100) }}</p>
                        @endif
                        <div class="flex justify-between items-center">
                            @if($work->completion_date)
                            <span class="text-gray-500 text-sm">{{ $work->completion_date->format('M Y') }}</span>
                            @endif
                            <div class="flex space-x-2">
                                <a href="{{ route('artisans.works.edit', [$artisan, $work]) }}" class="text-accent hover:text-amber-600 transition-colors duration-300 transform hover:scale-110">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('artisans.works.destroy', [$artisan, $work]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-danger hover:text-red-600 transition-colors duration-300 transform hover:scale-110" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réalisation ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-6">
                {{ $works->links() }}
            </div>
            @else
            <div class="text-center py-12 animate__animated animate__fadeIn">
                <i class="fas fa-paint-brush text-4xl text-gray-300 mb-4 animate__animated animate__fadeIn animate__delay-0.3s"></i>
                <h3 class="text-xl font-medium text-gray-500 mb-2 animate__animated animate__fadeIn animate__delay-0.6s">Aucune réalisation pour le moment</h3>
                <p class="text-gray-400 mb-6 animate__animated animate__fadeIn animate__delay-0.9s">Commencez par ajouter les réalisations de {{ $artisan->name }}.</p>
                <a href="{{ route('artisans.works.create', $artisan) }}" class="btn-primary animate__animated animate__fadeIn animate__delay-1.2s">
                    <i class="fas fa-plus mr-2"></i>Ajouter une réalisation
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection