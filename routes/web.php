<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContenidoPromocionalController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ServiciosController;
use Symfony\Component\HttpKernel\Profiler\Profile;

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


//Ruta para la HomePage
Route::get('/', [HomePageController::class, 'HomePage'])->name('HomePage');

Route::get('/prueba', function () {
  return view('anuncios.html');
});

Auth::routes(); //genera rutas login, logout,register, etc


Route::group(['middleware' => ['auth']], function () {
  //Poner aqui sus rutas Protegidas--------------------------------------------------------------------

  Route::get('/home', function () {
    return view('home');
  })->name('home');

  // Rutas para usuarios------------------------------------------------------------------------------
  Route::resource('users', UserController::class);
  Route::resource('profiles', ProfileController::class);
  //Bitacora------------------------------------------------------------------------------------------
  Route::resource('bitacora', BitacoraController::class);
  // Rutas para servicio-------------------------------------------------------------------------------
  Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios.index');
  Route::get('/servicios/create', [ServiciosController::class, 'create'])->name('servicios.create');
  Route::post('/servicios', [ServiciosController::class, 'store'])->name('servicios.store');
  Route::get('/servicios/{servicio}/edit', [ServiciosController::class, 'edit'])->name('servicios.edit'); // Cambié {servicios} a {servicio}
  Route::put('/servicios/{servicio}', [ServiciosController::class, 'update'])->name('servicios.update');
  Route::delete('/servicios/{servicio}', [ServiciosController::class, 'destroy'])->name('servicios.destroy');
  // Rutas para anuncios-------------------------------------------------------------------------------
  Route::resource('anuncios', AnuncioController::class);
  // Rutas para etiquetas------------------------------------------------------------------------------
  Route::resource('etiquetas', EtiquetaController::class);
  // Rutas para categorias-----------------------------------------------------------------------------
  Route::resource('categoria', CategoryController::class)->parameters(['categoria' => 'categoria']);
  //Contenido promocional--------------------------------------------------------------------
  Route::get('contenido_promocional', [ContenidoPromocionalController::class, 'index'])->name('contenido_promocional.index');
  Route::get('contenido_promocional/{anuncio}', [ContenidoPromocionalController::class, 'show'])->name('contenido_promocional.show');
  Route::post('contenido_promocional', [ContenidoPromocionalController::class, 'store'])->name('contenido_promocional.store');


  //Poner aqui sus rutas Protegidas--------------------------------------------------------------------



});
Route::post('/contar-visita', [VisitaController::class, 'contarVisita'])->name('contar.visita');
