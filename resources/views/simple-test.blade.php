@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Test des icônes Font Awesome</h1>
    
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Icônes de base</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="flex items-center">
                <i class="fas fa-home mr-2"></i>
                <span>Home</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-user mr-2"></i>
                <span>User</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-cog mr-2"></i>
                <span>Settings</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-envelope mr-2"></i>
                <span>Email</span>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">Icônes avec animation</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="flex items-center">
                <i class="fas fa-spinner fa-spin mr-2"></i>
                <span>Spinner</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-sync fa-spin mr-2"></i>
                <span>Sync</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-cog fa-spin mr-2"></i>
                <span>Cog</span>
            </div>
        </div>
    </div>
</div>
@endsection