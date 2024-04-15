<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Http\Requests\StoreAnuncioRequest;
use Spatie\Activitylog\Models\Activity;


class AnuncioController extends Controller
{

  public function __invoke()
  {
  }
  /**
   * Display a listing of the resource.
   */
  public function index()
  {

    return view('anuncios.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //$categorias = Categoria::all();
    //$categorias = Categoria::pluck('descripcion','id'); esto reconoce laravel colective

    $categorias = [
      "1" => "Vehículo",
      "2" => "Inmueble",
    ];

    $etiquetas = [
      "1" => "En promocion",
      "2" => "Negociable",
      "3" => "Nuevo",
      "4" => "Remato",
      "5" => "En Oferta",
      "6" => "Ocasión",
      "7" => "Liquidación",
      "8" => "Últimas Unidades",
    ];

    return view('anuncios.create'/* compact('categorias', 'etiquetas') */);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreAnuncioRequest $request)
  {
    $anuncio = Anuncio::create($request->all());

    //return redirect()->route('anuncios.edit', $anuncio);
    return redirect()->route('anuncios.index', $anuncio);
  }

  /**
   * Display the specified resource.
   */
  public function show(Anuncio $anuncio)
  {
    return view('anuncios.show', compact('anuncio'));
  }


  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Anuncio $anuncio)
  {
    return view('anuncios.edit', compact('anuncio'));
  }


  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Anuncio  $anuncio)
  {
    /* 
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users,email,' . $id,
      'password' => 'same:confirm-password',
    ]); */
    /* 
    $input = $request->all();
    if (!empty($input['password'])) {
      $input['password'] = Hash::make($input['password']);
    } else {
      $input = Arr::except($input, array('password'));
    } */

    $anuncio = Anuncio::find($anuncio->id);
    $anuncio->update($request->all());

    return redirect()->route('anuncios.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Anuncio $anuncio)
  {
    //
    $user = Anuncio::find($anuncio);

    date_default_timezone_set("America/La_Paz");
    //activity()->useLog('Usuarios')->log('Eliminó')->subject();
    /* $lastActivity = Activity::all()->last();
    $lastActivity->subject_id = auth()->user()->id;
    $lastActivity->save(); */

    $anuncio->delete();

    return redirect()->route('anuncios.index');
  }
}
