<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignarController;
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
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\RestoreController;
use App\Http\Controllers\SupportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Ruta para la HomePage
Route::get('/', [HomePageController::class, 'HomePage'])->name('HomePage');

// Ruta para la prueba
Route::get('/prueba', function () {
  return view('anuncios.html');
});

Auth::routes(); // Genera rutas login, logout, register, etc

//Rutas para usuarios-------------------------------------------------------------------------
Route::middleware(['auth', 'can:ver listado de usuarios'])->group(function () {
  // Rutas que requieren permiso para ver listado de usuarios
  Route::get('/users', [UserController::class,'index'])->name('users.index');

});

Route::middleware(['auth', 'can:crear usuario'])->group(function () {
  // Rutas que requieren permiso para crear usuario
  Route::get('/users/create', [UserController::class,'create'])->name('users.create');
  Route::post('/users/store', [UserController::class,'store'])->name('users.store');
});

Route::middleware(['auth', 'can:editar usuario'])->group(function () {
  // Rutas que requieren permiso para editar usuario
  Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
  //Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
  Route::match(['put', 'patch'], '/users/{user}', [UserController::class, 'update'])->name('users.update');
});


Route::middleware(['auth', 'can:eliminar usuario'])->group(function () {
  // Rutas que requieren permiso para eliminar usuario
  Route::delete('/users/{user}', [UserController::class,'destroy'])->name('users.destroy');
});

Route::middleware(['auth', 'can:mostrar usuario'])->group(function () {
  // Rutas que requieren permiso para mostrar un usuario
  Route::get('/users/{user}/show', [UserController::class,'show'])->name('users.show');
});
//----------------------------------------------------------------------------------------------

Route::group(['middleware' => ['auth']], function () {
  // Ruta para el dashboard
  Route::get('/home', function () {
    return view('home');
  })->name('home');

  // Rutas para usuarios

  Route::resource('users', UserController::class);

  //Route::resource('users', UserController::class);

  // Rutas para perfiles
  Route::resource('profiles', ProfileController::class);
  // Rutas para roles
  Route::resource('roles', RoleController::class);
  Route::post('/users/sistema/roles', [RoleController::class, 'store'])->name('roles.store');
  // Rutas para permisos
  Route::resource('permisos', PermisoController::class);
  Route::resource('usuarios', AsignarController::class)->names('asignar');
  // Rutas para bitácora
  Route::resource('bitacora', BitacoraController::class);
  // Rutas para servicios
  Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios.index');
  Route::get('/servicios/create', [ServiciosController::class, 'create'])->name('servicios.create');
  Route::post('/servicios', [ServiciosController::class, 'store'])->name('servicios.store');
  Route::get('/servicios/{servicio}/edit', [ServiciosController::class, 'edit'])->name('servicios.edit');
  Route::put('/servicios/{servicio}', [ServiciosController::class, 'update'])->name('servicios.update');
  Route::delete('/servicios/{servicio}', [ServiciosController::class, 'destroy'])->name('servicios.destroy');
  // Rutas para anuncios
  Route::resource('anuncios', AnuncioController::class);
  Route::post('anuncios/habilitado', [AnuncioController::class, 'habilitar'])->name('anuncios.habilitar');
  Route::post('anuncios/deshabilitado', [AnuncioController::class, 'deshabilitar'])->name('anuncios.deshabilitar');
  Route::post('anuncios/vendido', [AnuncioController::class, 'vendido'])->name('anuncios.vendido');
  Route::post('anuncios/disponible', [AnuncioController::class, 'disponible'])->name('anuncios.disponible');
  Route::get('anuncios/mensaje/{anuncio}', [AnuncioController::class, 'mensaje'])->name('anuncios.mensaje');
  // Rutas para categorías
  Route::resource('categoria', CategoryController::class)->parameters(['categoria' => 'categoria']);
	// Rutas para backups-----------------------------------------------------------------------------
  Route::get('/backups', [BackupController::class, 'index'])->name('backups.index');
  Route::post('/backups/create', [BackupController::class, 'create'])->name('backups.create');
  Route::delete('/backups/delete/{file_name}', [BackupController::class, 'delete'])->name('backups.delete');
  Route::get('/backups/download/{file_name}', [BackupController::class, 'download'])->name('backups.download');
	// Rutas para restore-----------------------------------------------------------------------------
  Route::get('/restore', [RestoreController::class, 'index'])->name('restore.index');
  Route::post('/restore/upload', [RestoreController::class, 'uploadAndRestore'])->name('restore.upload');
  Route::get('/restore/perform/{file_name}', [RestoreController::class, 'restoreFromPath'])->name('restore.perform');
	// Rutas para contenido promocional
  Route::get('contenido_promocional', [ContenidoPromocionalController::class, 'index'])->name('contenido_promocional.index');
  Route::get('contenido_promocional/{anuncio}', [ContenidoPromocionalController::class, 'show'])->name('contenido_promocional.show');
  Route::post('contenido_promocional', [ContenidoPromocionalController::class, 'store'])->name('contenido_promocional.store');
  // Rutas para etiquetas
  Route::resource('etiquetas', EtiquetaController::class);
  // Rutas para controlador
  Route::post('/support/send', [SupportController::class, 'send'])->name('support.send');

});

// Ruta para contar visita
Route::post('/contar-visita', [VisitaController::class, 'contarVisita'])->name('contar.visita');
