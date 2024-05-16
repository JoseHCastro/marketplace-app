<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Bitacora;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
   public function HomePage()
   {

      $categorias = Categoria::all();

      $anuncios = Anuncio::all();
      return view('homepage', compact('categorias', 'anuncios'));
   }

   public function details($id, Request $request)
   {
      $anuncio = Anuncio::findOrFail($id);
      $anuncio->visitas += 1;
      $anuncio->save();

      date_default_timezone_set("America/La_Paz");
      $bitacora = new Bitacora();
      if (Auth::check()){
         $bitacora->usuario = Auth::user()->name;
      }else{
         $bitacora->usuario ='Invitado';
      }    
      $bitacora->hora = now();      
      $bitacora->evento = 'Mostrar';
      $bitacora->contexto = 'Anuncio';
      $bitacora->descripcion = 'Visualizó el anuncio ' . $anuncio->titulo;
      $bitacora->origen = 'Web';
      $bitacora->ip = $request->ip();
      $bitacora->save();

      return view('details', compact('anuncio'));
   }
}
