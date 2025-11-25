<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/embellished', [HomeController::class, 'embellished'])->name('embellished');
Route::get('/categories/btp', [CategoryController::class, 'btp'])->name('categories.btp');
Route::get('/categories/informatique', [CategoryController::class, 'informatique'])->name('categories.informatique');
Route::get('/categories/securite', [CategoryController::class, 'securite'])->name('categories.securite');
Route::get('/categories/applications', [CategoryController::class, 'applications'])->name('categories.applications');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
Route::get('/artisans/examples', function () {
    return view('artisans.examples');
})->name('artisans.examples');

Route::get('/artisans/subcategories', function () {
    return view('artisans.subcategories');
})->name('artisans.subcategories');

Route::resource('artisans', ArtisanController::class);
Route::resource('service-categories', ServiceCategoryController::class);
Route::resource('service-requests', ServiceRequestController::class);
Route::post('/service-requests/{id}/select-quote', [ServiceRequestController::class, 'selectQuote'])->name('service-requests.select-quote');
Route::post('/service-requests/{id}/generate-invoice', [ServiceRequestController::class, 'generateInvoice'])->name('service-requests.generate-invoice');
Route::resource('quotes', QuoteController::class);
Route::resource('invoices', InvoiceController::class);
Route::resource('reviews', ReviewController::class);