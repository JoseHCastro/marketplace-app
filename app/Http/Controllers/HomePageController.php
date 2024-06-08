<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Bitacora;
use App\Models\Categoria;
use App\Models\Servicios;
use Illuminate\Http\Request;
use App\Models\AnuncioServicio;
use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function HomePage()
    {
        $categorias = Categoria::where('padre_id', null)->get();
        $anuncios = Anuncio::all();
        return view('homepage', compact('categorias', 'anuncios'));
    }
    public function FiltroHomePage(Request $request)
    {
        $categorias = Categoria::all();
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

    $comentarios=Comentario::where('anuncio_id',$id)->get();

    return view('details', compact('anuncio'), compact('comentarios'));
  }
}
