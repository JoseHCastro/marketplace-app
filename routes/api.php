<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ChatController;

use App\Http\Controllers\Api\CategoriaApi;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\StripeApiController;
use App\Http\Controllers\Api\AnuncioController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\MembreciaController;
use App\Http\Controllers\Api\PagoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

/* ---------------------------------------------------- */
/* leer:
1. http://127.0.0.1:8000 url de la app cuando ejecuta php artisan serve, configurado en .env
2. todo lo que este adentro del midleware 'auth:api' pedira token
  3.1 el token se envia en el header de la peticion con el nombre Authorization y el valor Bearer + token para que el middleware lo pueda leer y validar que es correcto el token.
  3.2 el token se obtiene con el login
4. php artisan jwt:secret   ,ejecutar en consola para genera key secret de jwt, hacer esto luego de darle pull o clonar el repositorio
5. para acceder al endpoint o api la url por ejemplo seria:
      http://127.0.0.1:8000/api/auth/login //el metodo login() devolvera el token
      http://127.0.0.1:8000/api/auth/register //almacena en la db
      http://127.0.0.1:8000/api/auth/usuarios //listado de usuarios
      etc...

6. no olvidar punto 2. para enviar el token en el header de la peticion, postman o insomnia
7. para ignorar token colocar rutas fuera del midleware => 'auth:api'
*/
/* ---------------------------------------------------- */

Route::group([
  //'middleware' => 'auth:api', //midleware auth:api para este grupo esta en AuthController en el constructor
  'prefix' => 'auth'
], function () {

  /* --------------------------------inicio, cierre, registro,me con jwt---------------------------------------- */
  Route::post('/register', [AuthController::class, 'register'])->name('register'); //email, password, name requerido
  Route::post('/login', [AuthController::class, 'login'])->name('login'); //email y password requerido
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
  Route::post('/refresh', [AuthController::class, 'refresh'])->name('refresh'); //deshabilitado
  Route::post('/me', [AuthController::class, 'me'])->name('me'); //token requerido en la cabecera de la solicitud
});

Route::group([
  'middleware' => 'auth:api', //todas las rutas colocadas aqui seran protegidas por el midleware auth:api 
  'prefix' => 'auth'

  /*para acceder por insomnia por ejemplo metodo GET:
   http://127.0.0.1:8000/api/auth/usuarios //listado de usuarios */
], function () {
  /* ---------------------------------------------usuarios------------------------------------------------ */
  Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index'); //listo
  Route::get('usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create'); //no utilizado en api
  Route::post('usuarios', [UsuarioController::class, 'store'])->name('usuarios.store'); //listo
  Route::get('usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show'); //listo
  Route::get('usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit'); // no utilizado en api
  Route::put('usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update'); //listo
  Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy'); //listo
  /* ---------------------------------------------anuncios------------------------------------------------ */

  /* ---------------------------------------------Mensajes Privados------------------------------------------------- */

  Route::apiResource('/mensajes', MensajeController::class);
  Route::get('/chats', [ChatController::class, 'getUserChats']);
  
 
  Route::post('/pagos', [PagoController::class, 'store']);
});
/* -------------colocar aqui rutas ignoradas por el midleware, quitar el prefijo auth de la url en insomnia o postman ya q no esta en el grupo de ruta----------------- */
// RUTA PARA OBTENER LOS ANUNCIOS

Route::get('/anuncios', [AnuncioController::class, 'index']);

Route::get('/membrecias', [MembreciaController::class, 'index']);
Route::post('/handle-payment', [StripeApiController::class, 'handlePayment']);
//RUTA PARA OBTENES CATEGORIAS

Route::get('/categorias', [CategoriaApi::class, 'index']);






Route::get('/imagenes/{nombreImagen}', function ($nombreImagen) {
  $rutaImagen = 'public/images/anuncios/' . $nombreImagen;
  $contenidoImagen = Storage::get($rutaImagen);
  $tipoContenido = Storage::mimeType($rutaImagen);
  
  return response($contenidoImagen, 200)->header('Content-Type', $tipoContenido);
});
