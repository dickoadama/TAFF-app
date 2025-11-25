@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="mt-8 text-2xl">
                    Détails de la catégorie
                </div>

                <div class="mt-6 text-gray-500">
                    Informations détaillées sur la catégorie {{ $serviceCategory->name }}.
                </div>
            </div>

            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1">
                <div class="p-6">
                    <div class="text-lg text-gray-600 leading-7 font-semibold">
                        Informations de la catégorie
                    </div>

                    <div class="mt-4">
                        <div class="text-sm text-gray-500">
                            <strong>Nom:</strong> {{ $serviceCategory->name }}
                        </div>
                        <div class="text-sm text-gray-500 mt-2">
                            <strong>Description:</strong> {{ $serviceCategory->description ?? 'Non renseignée' }}
                        </div>
                        <div class="text-sm text-gray-500 mt-2">
                            <strong>Icône:</strong> {{ $serviceCategory->icon ?? 'Non renseignée' }}
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end">
                        <a href="{{ route('service-categories.edit', $serviceCategory) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Modifier
                        </a>
                        <form action="{{ route('service-categories.destroy', $serviceCategory) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection