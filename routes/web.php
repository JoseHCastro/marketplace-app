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

Route::group(['middleware' => ['auth']], function () {
    // Ruta para el dashboard
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Rutas para usuarios
    Route::resource('users', UserController::class);

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

    // Rutas para etiquetas
    Route::resource('etiquetas', EtiquetaController::class);

    // Rutas para categorías
    Route::resource('categoria', CategoryController::class)->parameters(['categoria' => 'categoria']);

    // Rutas para contenido promocional
    Route::get('contenido_promocional', [ContenidoPromocionalController::class, 'index'])->name('contenido_promocional.index');
    Route::get('contenido_promocional/{anuncio}', [ContenidoPromocionalController::class, 'show'])->name('contenido_promocional.show');
    Route::post('contenido_promocional', [ContenidoPromocionalController::class, 'store'])->name('contenido_promocional.store');
});

// Ruta para contar visita
Route::post('/contar-visita', [VisitaController::class, 'contarVisita'])->name('contar.visita');

?>
