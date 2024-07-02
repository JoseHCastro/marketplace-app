<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Bitacora;
use App\Models\Categoria;
use App\Models\Servicios;
use Illuminate\Http\Request;
use App\Models\AnuncioServicio;
use App\Models\Comentario;
use App\Models\Membresia;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
  public function HomePage()
  {
    /* $categorias = Categoria::where('padre_id', null)->get(); */
    $categorias = Categoria::where('padre_id', '!=', null)->get();

    /*  return view('homepage', compact('categorias', 'anuncios'));
 */
    // Recuperar los anuncios ordenados por su posición
    $anuncios = Anuncio::orderBy('posicion_principal')->get();


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

  public function FiltroHomePage(Request $request)
  {
    /* $categorias = Categoria::all(); */

    /* $categorias = Categoria::where('padre_id', null)->get(); */
    $categorias = Categoria::where('padre_id', '!=', null)->get();

    $anunciosQuery = Anuncio::with('categoria');

    if ($request->has('categoria') && $request->categoria !== null && $request->categoria !== '') {
      $anunciosQuery->where('categoria_id', $request->categoria);
    }
    if ($request->has('precio_min') && $request->precio_min !== null && $request->precio_min !== '') {
      $anunciosQuery->where('precio', '>=', $request->precio_min);
    }
    if ($request->has('precio_max') && $request->precio_max !== null && $request->precio_max !== '') {
      $anunciosQuery->where('precio', '<=', $request->precio_max);
    }
    $anuncios = $anunciosQuery->get();
    return view('homepage', compact('categorias', 'anuncios'));
  }
  public function FiltroSearch(Request $request)
  {
    $query = $request->input('search_query'); // Obtener el parámetro 'search_query' del formulario

    $categorias = Categoria::where('padre_id', '!=', null)->get(); // Obtener todas las categorías

    $anuncios = Anuncio::where('titulo', 'like', '%' . $query . '%')
                        ->orWhere('descripcion', 'like', '%' . $query . '%')
                        ->get(); // Consulta para buscar por título o descripción

    $mostrarBanner = false; // Variable para controlar si mostrar el banner o no

    return view('tester', compact('anuncios', 'query', 'categorias', 'mostrarBanner'));
  }






  public function details($id, Request $request)
  {
    $anuncio = Anuncio::findOrFail($id);
    $anuncio->visitas += 1;
    $anuncio->save();

    date_default_timezone_set("America/La_Paz");
    $bitacora = new Bitacora();
    if (Auth::check()) {
      $bitacora->usuario = Auth::user()->name;
    } else {
      $bitacora->usuario = 'Invitado';
    }
    $bitacora->hora = now();
    $bitacora->evento = 'Mostrar';
    $bitacora->contexto = 'Anuncio';
    $bitacora->descripcion = 'Visualizó el anuncio ' . $anuncio->titulo;
    $bitacora->origen = 'Web';
    $bitacora->ip = $request->ip();
    $bitacora->save();

    $comentarios = Comentario::where('anuncio_id', $id)->get();

    return view('details', compact('anuncio'), compact('comentarios'));
  }

  public function planes(Request $request)
  {
    $membresias= Membresia::all();

    date_default_timezone_set("America/La_Paz");
    $bitacora = new Bitacora();
    if (Auth::check()) {
      $bitacora->usuario = Auth::user()->name;
    } else {
      $bitacora->usuario = 'Invitado';
    }
    $bitacora->hora = now();
    $bitacora->evento = 'Mostrar';
    $bitacora->contexto = 'Membresías';
    $bitacora->descripcion = 'Visualizó los planes de membresía';
    $bitacora->origen = 'Web';
    $bitacora->ip = $request->ip();
    $bitacora->save();

    return view('planes', compact('membresias'));
  }
}
