<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Etiqueta;
use App\Models\servicios;
use Illuminate\Http\Request;
/* use Illuminate\Support\Carbon; */
use Carbon\Carbon;
use App\Models\AnuncioEtiqueta;
use App\Models\ContenidoPromocional;

class ContenidoPromocionalController extends Controller
{
  //
  public function index()
  {

    return view('anuncios.create_contenido_promocional', compact('etiquetas'));
  }

  public function store(Request $request)
  {
    /*  $request->validate([
      'titulo' => 'required',
      'descripcion' => 'required',
      'imagen' => 'required',
      'etiquetas' => 'required',
    ]); */

    $etiquetas = $request->etiquetas;
    /* $etiquetas = implode(",", $etiquetas); */ //convertir array en string, separado por comas, para guardar en la base de datos, si no se hace esto, se guarda como array
    $anuncio = Anuncio::findOrFail($request->id_anuncio);
    $anuncio->etiquetas()->sync($etiquetas/* , false */); //en false, no se borran las etiquetas anteriores, solo se agregan las nuevas //en true, se borran las etiquetas anteriores y se agregan las nuevas


    /* --------------- para agregar el servicio a la tabla intermedia anuncio_servicio(incompleto) -------------- */
    $numero_dias = 0;
    if ($request->numero_semanas == 1) {
      $numero_dias = 7;
    } elseif ($request->numero_semanas == 2) {
      $numero_dias = 14;
    } elseif ($request->numero_semanas == 3) {
      $numero_dias = 21;
    } elseif ($request->numero_semanas == 4) {
      $numero_dias = 28;
    }

    $fecha_inicio_servicio = Carbon::now();
    $fecha_fin_servicio = Carbon::now();

    //resolver: como guardar en la base de datos la fecha de inicio y la fecha de fin del servicio y el id del anuncio y el id del servicio en la tabla intermedia anuncio_servicio 🤔

    /* $anuncio->servicios()->attach($request->numero_semanas, ['fecha_inicio' => $request->fecha_inicio, 'fecha_fin' => $request->fecha_fin]); */
    /* $anuncio->servicios()->attach(['fecha_inicio' => $fecha_inicio_servicio, 'fecha_fin' => $fecha_fin_servicio->addDays($numero_dias)]); */

    /* --------------- para agregar el servicio a la tabla intermedia anuncio_servicio(incompleto) --------------- */

    return redirect()->route('anuncios.index');
    /* ->with('success', 'Contenido promocional creado exitosamente.'); */
  }

  public function show(Anuncio $anuncio)
  {
    $etiquetas = Etiqueta::all();
    $servicios = servicios::all();
    return view('anuncios.contenido_promocional_show', compact('anuncio', 'etiquetas', 'servicios'));
  }
}
