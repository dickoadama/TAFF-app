<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\SearchController;

use App\Http\Controllers\QuoteController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtisanProfileController;
use App\Http\Controllers\WorksController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\ArtisanWorkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home.page');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/test', function () {
    return view('test');
})->name('test');
Route::get('/simple-test', function () {
    return view('simple-test');
})->name('simple-test');

Route::get('/test-video', function () {
    return view('test-video');
})->name('test-video');

// Routes pour les réalisations, partenariats et contacts
Route::get('/works', [WorksController::class, 'index'])->name('works.index');
Route::get('/works/gallery', [WorksController::class, 'gallery'])->name('works.gallery');
Route::get('/partners', [PartnersController::class, 'index'])->name('partners.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');

// Routes pour les catégories
Route::get('/categories/btp', [CategoryController::class, 'btp'])->name('categories.btp');
Route::get('/categories/informatique', [CategoryController::class, 'informatique'])->name('categories.informatique');
Route::get('/categories/securite', [CategoryController::class, 'securite'])->name('categories.securite');
Route::get('/categories/applications', [CategoryController::class, 'applications'])->name('categories.applications');
Route::get('/categories/travaux_publics', function () {
    return view('categories.travaux_publics');
})->name('categories.travaux_publics');
Route::get('/categories/construction_renovation', function () {
    return view('categories.construction_renovation');
})->name('categories.construction_renovation');
Route::get('/categories/services_informatiques', function () {
    return view('categories.services_informatiques');
})->name('categories.services_informatiques');
Route::get('/categories/plus_encore', function () {
    return view('categories.plus_encore');
})->name('categories.plus_encore');

// Routes pour le profil des artisans
Route::get('/artisan-profile', [ArtisanProfileController::class, 'index'])->name('artisan.profile');
Route::get('/artisans/subcategories', function () {
    return view('artisans.subcategories');
})->name('artisans.subcategories');
Route::get('/artisans/examples', function () {
    return view('artisans.examples');
})->name('artisans.examples');

// Routes authentifiées
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profil utilisateur
    Route::get('/profile/edit', function () {
        return view('auth.edit');
    })->name('profile.edit');
    
    // Artisans
    Route::resource('artisans', ArtisanController::class);
    Route::get('/artisans/featured', [ArtisanController::class, 'featured'])->name('artisans.featured');
    
    // Réalisations des artisans
    Route::resource('artisans.works', ArtisanWorkController::class);
    
    // Catégories de service
    Route::resource('service-categories', ServiceCategoryController::class);
    
    // Demandes de service
    Route::resource('service-requests', ServiceRequestController::class);
    
    // Devis
    Route::resource('quotes', QuoteController::class);
    
    // Factures
    Route::resource('invoices', InvoiceController::class);
    
    // Produits
    Route::resource('products', ProductController::class);
    Route::get('/products/get-product-details/{id}', [ProductController::class, 'getProductDetails'])->name('products.get-details');
    
    // Avis
    Route::resource('reviews', ReviewController::class);
    
    // Chat
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
});

// Routes d'authentification
require __DIR__.'/auth.php';

// Routes pour les pages légales
Route::get('/legal/terms', function () {
    return view('legal.terms');
})->name('legal.terms');

Route::get('/legal/privacy', function () {
    return view('legal.privacy');
})->name('legal.privacy');

Route::get('/legal/mentions', function () {
    return view('legal.mentions');
})->name('legal.mentions');
