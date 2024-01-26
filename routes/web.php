<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\InvokableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/create', function() {
//     return view('create');
// });

// Rotte eventi



//Rotte autentificazione
Auth::routes();

Route::middleware(['auth'])->group(function () {
    //Rotte di eventi che richiedono autenticazione
    Route::get('/events', [EventController::class, 'index'])->name('index');
    Route::post('/events', [EventController::class, 'store']);
    Route::get('/event/{id}', [EventController::class, 'show'])->name('show');
    Route::get('/events/create', [EventController::class, 'create'])->name('create');
    Route::post('/event/{id}', [EventController::class, 'update'])->name('update');
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('edit');
    Route::post('/event/{id}/destroy', [EventController::class, 'destroy'])->name('destroy');
    Route::post('/event/{id}/subscription', [EventController::class, 'subscription'])->name('subscription');
    Route::post('/event/{id}/unsubscription', [EventController::class, 'unsubscription'])->name('unsubscription');

    //Rotte per i prodotti che richiedono autentificazione
    Route::get('/events/{id}/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/events/{eventId}/products/{productId}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/events/{eventId}/products/{productId}', [ProductController::class, 'update'])->name('products.update');
    Route::post('/events/{eventId}/products/{productId}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/events/{eventId}/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/events/{id}/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/events/{eventId}/products/{productId}', [ProductController::class, 'show'])->name('products.show');
});


//Rotta login
Route::get('/home', [HomeController::class, 'index'])->name('home');
