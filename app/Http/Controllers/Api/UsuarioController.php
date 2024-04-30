<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {

    $user = User::all();

    if ($user->isEmpty()) {
      $data = [
        'message' => 'No hay usuarios registrados',
        'status' => '404'
      ];
      return response()->json($data);
    }
    $data = [
      'message' => 'Usuarios encontrados',
      'status' => '200',
      'data' => $user
    ];
    return response()->json($data, 201);
    /* return view('cursos.index', compact('cursos')); */
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:8',
    ]);
    if ($validator->fails()) {

      $data = [
        'message' => 'Error al registrar usuario',
        'status' => '400',
        'data' => $validator->errors()
      ];

      return response()->json($data, 400);
    }

    $usuario = User::create($request->all());

    if ($usuario) {
      $data = [
        'message' => 'Usuario creado',
        'status' => '201',
        'data' => $usuario
      ];
      return response()->json($data, 201);
    } else {
      $data = [
        'message' => 'Error al crear usuario',
        'status' => '400'
      ];
      return response()->json($data, 400);
    }
  }



  /**
   * Display the specified resource.
   */
  public function show(User $usuario)
  {
    if ($usuario) {
      $data = [
        'message' => 'Usuario encontrado',
        'status' => '200',
        'data' => $usuario
      ];
      return response()->json($data, 200);
    } else {
      $data = [
        'message' => 'Usuario no encontrado',
        'status' => '404'
      ];
      return response()->json($data, 404);
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $usuario)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $usuario)
  {
    //
    if (!$usuario) {
      $data = [
        'message' => 'Usuario no encontrado',
        'status' => '404'
      ];
      return response()->json($data, 404);
    }
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:8',
    ]);

    if ($validator->fails()) {
      $data = [
        'message' => 'Error en la validación de los datos',
        'status' => '400',
        'data' => $validator->errors()
      ];
      return response()->json($data, 400);
    }

    $usuario->update($request->all());
    $data = [
      'message' => 'Usuario actualizado',
      'status' => '200',
      'data' => $usuario
    ];
    return response()->json($data, 200);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $usuario)
  {
    //
    if (!$usuario) {
      $data = [
        'message' => 'Usuario no encontrado',
        'status' => '404'
      ];
      return response()->json($data, 404);
    }

    $usuario->delete();
    $data = [
      'message' => 'Usuario eliminado',
      'status' => '200'
    ];
    return response()->json($data, 200);
  }
}
