<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Bitacora;
use App\Models\Categoria;
use App\Models\Servicios;
use Illuminate\Http\Request;
use App\Models\AnuncioServicio;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
  public function HomePage()
  {
   

    // Recuperar los anuncios ordenados por su posición
    $anuncios = Anuncio::orderBy('posicion_principal')->get();
    $categorias = Categoria::all();


    // Recuperar los anuncios que tienen etiquetas
    $anunciosConEtiquetas = Anuncio::has('etiquetas')->get();


    // Recuperar los anuncios con sus servicios y fechas de inicio/fin
    /* $anunciosConServicios = Anuncio::with('servicios')->get(); */




    // Recuperar los AnuncioServicio que tienen asignado el servicio con ID 2
    $anuncioServicios2 = AnuncioServicio::where('servicios_id', '2')->get();
    /* return $anuncioServicios; */

    // Pasar los anuncios a la vista
    return view('homepage', compact('categorias', 'anuncios', 'anunciosConEtiquetas', 'anuncioServicios2'));
  }
}
