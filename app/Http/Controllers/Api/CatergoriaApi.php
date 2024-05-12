<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Categoria;


class CategoriaApi extends Controller{


    public function index()
    {
        // No se coloco servicios por un error
        $categorias = Categoria::all();
        // Devuelve los anuncios en formato JSON
        return response()->json($categorias);
    }

}
