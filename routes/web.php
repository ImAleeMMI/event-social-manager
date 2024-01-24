<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\InvokableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;

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
Route::get('/events', [EventController::class, 'index'])->name('index');
Route::get('/events/create', [EventController::class, 'create'])->name('create');
Route::post('/events', [EventController::class, 'store']);
Route::get('/event/{id}', [EventController::class, 'show'])->name('show');
Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('edit');
Route::post('/event/{id}', [EventController::class, 'update'])->name('update');
Route::post('/event/{id}/destroy', [EventController::class, 'destroy'])->name('destroy');


//Rotte Prodotti Eventi
Route::get('/events/{eventId}/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/events/{id}/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/events/{id}/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/events/{eventId}/products/{productId}', [ProductController::class, 'show'])->name('products.show');
Route::get('/events/{eventId}/products/{productId}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/events/{eventId}/products/{productId}', [ProductController::class, 'update'])->name('products.update');
Route::post('/events/{eventId}/products/{productId}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/pagina', 'Controller@metodo')->middleware('web');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::prefix('events')->group(function() {

//     //Visualizzazione della lista degli eventi
//     Route::get('/{page?}', [EventController::class, 'index'])->whereNumber(['page']);

//     //Filtraggio per categoria
//     Route::get('/category/{category}/{page?}', function ($category, $page = null) {
//         if(!$page){
//             $page = 1;
//         }
//         return "Lista eventi della categoria $category. Siamo in pagina $page";
//     })->whereNumber(['page']);

//     //Ricerca testuale degli eventi
//     Route::get('/search/{text}', function ($text) {
//         return [1, 3, 'test'];
//         //return "Ricerca evento. Testo di ricerca: $text";
//     });
// });

// Route::prefix('event')->group(function() {
//     //Visualizzazione dei dettagli dell'evento
//     Route::get('/{event}', function (){
//         return 'Evento';
//     });

//     Route::middleware('auth')->group(function () {

//         //Visualizzazione dei dettagli dell'evento
//         Route::post('/subscription', function ($request) {
//             return "L'utente ciccio si è iscritto all'evento 123.";
//         });

//         Route::get('/new', function () {
//             return "Form di creazione di un nuovo evento.";
//         });

//         Route::post('/new', function () {
//             return "Richiesta di creazione nuovo evento.";
//         });

//         Route::get('/{event}/edit', function ($event) {
//             return "Form di edit dell'evento $event.";
//         });

//         Route::post('/{event}/edit', function (Request $request, $event) {
//             $request->all();
//             return "Richiesta di modifico evento $event.";
//         });

//         Route::post('/{event}/delete', function ($event, $request) {
//             return "Richiesta di eliminazione evento.";
//         });
//     });

// });

// Route::prefix('user')->group(function() {
//     //Visualizzazione dei dettagli dell'evento
//     Route::get('/{id_user}', function ($id_user) {
//         return "Dettagli utente $id_user";
//     });

//     Route::get('/new', function () {
//         return "Registrazione nuovo utente.";
//     });

//     Route::post('/new', function () {
//         return "Richiesta registrazione nuovo utente.";
//     });

//     Route::middleware('auth')->group(function () {

//         Route::get('/{id_user}/edit', function ($id_user) {
//             return "Form di edit del profilo utente $id_user.";
//         });

//         Route::post('/{id_user}/edit', function ($event, $request) {
//             return "Richiesta di modifica profilo utente.";
//         });

//         Route::post('/{id_user}/delete', function ($event, $request) {
//             return "Richiesta di eliminazione evento.";
//         });

//         Route::get('/{id_user}/stats', function ($id_user) {
//             return "Statistiche utente $id_user.";
//         });
//     });

// });

// Route::get('/login', function () {
//     return "Login utente.";
// });

// Route::post('/login', function () {
//     return "RIchiesta login utente.";
// });

// Route::post('/logout', function () {
//     return "RIchiesta logout utente.";
// })->middleware(['auth']);

// Route::get('/reset-password', function () {
//     return "Login utente.";
// });

// Route::post('/reset-password', function () {
//     return "RIchiesta login utente.";
// });

//Registrazione e autenticazione degli utenti
//Auth::routes();