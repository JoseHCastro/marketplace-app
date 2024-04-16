<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;

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



Route::get('/', [HomePageController::class, 'HomePage'])->name('homePage');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::view('homepage', 'homepage');

Auth::routes();

Route::get('/home', function () {
  return view('home');
})->name('home')->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', UserController::class);

    // Rutas para Servicios
    Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios.index');
    Route::get('/servicios/create', [ServiciosController::class, 'create'])->name('servicios.create');
    Route::post('/servicios', [ServiciosController::class, 'store'])->name('servicios.store');
    Route::get('/servicios/{servicio}/edit', [ServiciosController::class, 'edit'])->name('servicios.edit'); // Cambié {servicios} a {servicio}
    Route::put('/servicios/{servicio}', [ServiciosController::class, 'update'])->name('servicios.update');
    Route::delete('/servicios/{servicio}', [ServiciosController::class, 'destroy'])->name('servicios.destroy');
  Route::resource('users', UserController::class);

  //Poner aqui sus rutas Protegidas

  //--------------------anuncio-----------------------
  Route::resource('anuncios', AnuncioController::class);
  Route::resource('users', UserController::class);

  Route::resource('etiquetas', EtiquetaController::class);

  //Poner aqui sus rutas Protegidas
});

Route::group(['middleware' => ['web']], function () {
    Route::resource('categoria', CategoryController::class)->parameters(['categoria' => 'categoria']);
});

