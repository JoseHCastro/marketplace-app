<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Anuncio;


class AnuncioController extends Controller{


    public function index()
    {
        // No se coloco servicios y estado por un error
        $anuncios = Anuncio::with(['categoria', 'condicion', 'Moneda', 'usuario', 'imagen', 'etiquetas'])->get();

        // Devuelve los anuncios en formato JSON
        return response()->json($anuncios);
    }

}

