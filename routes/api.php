<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/* notas
1. http://127.0.0.1:8000 url de la app
2. el token se obtiene con el login
3. todo lo que este adentro del midleware pedira token
  3.1 el token se envia en el header de la peticion con el nombre Authorization y el valor Bearer + token para que el middleware lo pueda leer y validar que es correcto el token.


*/


