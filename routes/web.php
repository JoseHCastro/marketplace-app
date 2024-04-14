<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\UserController;

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

// Ruta para el inicio de sesión
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
});
