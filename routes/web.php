<?php

use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use App\Http\Controllers\ServiciosController;
=======
use Illuminate\Support\Facades\Route;

>>>>>>> 8fd95c8b5faf3ce5edd3ef8875e6f4a891123bfc
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\AnuncioController;

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

Route::get('/', function () {
    return view('homepage');
});

Auth::routes();

<<<<<<< HEAD
// Ruta para el inicio de sesión
=======
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('homepage', 'homepage');

Auth::routes();

>>>>>>> 8fd95c8b5faf3ce5edd3ef8875e6f4a891123bfc
Route::get('/home', function () {
  return view('home');
})->name('home')->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
<<<<<<< HEAD
    Route::resource('users', UserController::class);

    // Rutas para Servicios
    Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios.index');
    Route::get('/servicios/create', [ServiciosController::class, 'create'])->name('servicios.create');
    Route::post('/servicios', [ServiciosController::class, 'store'])->name('servicios.store');
    Route::get('/servicios/{servicio}/edit', [ServiciosController::class, 'edit'])->name('servicios.edit'); // Cambié {servicios} a {servicio}
    Route::put('/servicios/{servicio}', [ServiciosController::class, 'update'])->name('servicios.update');
    Route::delete('/servicios/{servicio}', [ServiciosController::class, 'destroy'])->name('servicios.destroy');
=======
  Route::resource('users', UserController::class);

  //Poner aqui sus rutas Protegidas

  //--------------------anuncio-----------------------
  Route::resource('anuncios', AnuncioController::class);
  Route::resource('users', UserController::class);

  Route::resource('etiquetas', EtiquetaController::class);

  //Poner aqui sus rutas Protegidas
>>>>>>> 8fd95c8b5faf3ce5edd3ef8875e6f4a891123bfc
});

Route::group(['middleware' => ['web']], function () {
    Route::resource('categoria', CategoryController::class)->parameters(['categoria' => 'categoria']);
});

