<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
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
  //return view('welcome');
  return view('homepage');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('homepage', 'homepage');

Auth::routes();

Route::get('/home', function () {
  return view('home');
})->name('home')->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
  Route::resource('users', UserController::class);

  //Poner aqui sus rutas Protegidas

  //--------------------anuncio-----------------------by alejandro
  Route::resource('anuncios', AnuncioController::class);
});
