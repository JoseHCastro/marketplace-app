<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Categoria;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
     public function HomePage() {

        $categorias = Categoria::all();

        $anuncios = Anuncio::all();
        return view('homepage', compact('categorias','anuncios'));
        
     }
}
