<?php

namespace App\Http\Controllers\Api;

use id;
use App\Models\User;
use App\Models\Bitacora;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
  /**
   * Create a new AuthController instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth:api', ['except' => ['login', 'register']]); //middleware('auth:api') -> para proteger todas las rutas, excepto login y register
  }


  /**
   * Register a User.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function register(Request $request)
  {
    $validator = Validator::make(request()->all(), [
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:8',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors()->toJson(), 400);
    }

    $user = new User;
    $user->name = request()->name;
    $user->email = request()->email;
    $user->password = bcrypt(request()->password);

    $user->save();

    date_default_timezone_set("America/La_Paz");

    $bitacora = new Bitacora();
    $bitacora->usuario = $user->name;
    $bitacora->hora = now();
    $bitacora->evento = 'Registro';
    $bitacora->contexto = 'Registro';
    $bitacora->descripcion = 'El usuario se ha registrado';
    $bitacora->origen = 'Movil';
    $bitacora->ip = $request->ip();
    $bitacora->save();


    return response()->json($user, 201);
  }


  /**
   * Get a JWT via given credentials.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function login(Request $request)
  {
    $credentials = request(['email', 'password']);

    if (!$token = auth('api')->attempt($credentials)) {
      return response()->json(['error' => 'Unauthorized'], 401);
    }

    //BITACORA
    // $user = Auth::user();
    // date_default_timezone_set("America/La_Paz");
    // $bitacora = new Bitacora();
    // $bitacora->usuario = $user->name;
    // $bitacora->hora = now();
    // $bitacora->evento = 'Login';
    // $bitacora->contexto = 'Sesion';
    // $bitacora->descripcion = 'El usuario ha iniciado sesión';
    // $bitacora->origen = 'API';
    // $bitacora->ip = $request->ip();
    // $bitacora->save();

    return $this->respondWithToken($token);
  }



  /**
   * Get the authenticated User.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function me()
  {
    return response()->json(auth('api')->user());
  }

  /**
   * Log the user out (Invalidate the token).
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function logout(Request $request)
  {
    $user = Auth::user(); //BITACORA

    auth('api')->logout();

    //BITACORA
    date_default_timezone_set("America/La_Paz");
    $bitacora = new Bitacora();
    $bitacora->usuario = $user->name;
    $bitacora->hora = now();
    $bitacora->evento = 'Logout';
    $bitacora->contexto = 'Sesion';
    $bitacora->descripcion = 'El usuario ha cerrado sesión';
    $bitacora->origen = 'API';
    $bitacora->ip = $request->ip();
    $bitacora->save();

    return response()->json(['message' => 'Successfully logged out']);
  }

  /**
   * Refresh a token.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function refresh()
  {
    //return $this->respondWithToken(auth('api')->refresh());

    //return $this->respondWithToken(Auth::refresh());
  }

  /**
   * Get the token array structure.
   *
   * @param  string $token
   *
   * @return \Illuminate\Http\JsonResponse
   */
  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      //'expires_in' => auth('api')->factory()->getTTL() * 60
      "user" => [
        "id" => auth('api')->user()->id,
        "name" => auth('api')->user()->name,
        "email" => auth('api')->user()->email,
        
      ]
    ]);
  }
}
