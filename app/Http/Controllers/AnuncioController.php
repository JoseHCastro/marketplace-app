<?php

namespace App\Http\Controllers;

use App\Exports\AnuncioExport;
use App\Models\Estado;
use App\Models\Moneda;
use App\Models\Anuncio;
use App\Models\Categoria;
use App\Models\Condicion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\StoreAnuncioRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Bitacora;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use TCPDF;

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
    /* $anuncios = Anuncio::all(); */

    if (auth()->user()->id === 7) {
      $anuncios = Anuncio::all();
    } else {
      $anuncios = Anuncio::where('user_id', auth()->user()->id)->get();
    }

    /* $colores = [
      "1" => "Rojo",
      "2" => "Azul",
      "3" => "Verde",
      "4" => "Amarillo",
      "5" => "Naranja",
      "6" => "Morado",
      "7" => "Café",
    ]; */

    $categorias = Categoria::all();
    $users = User::all();
    return view('anuncios.index', compact('anuncios', 'categorias'/* ,'colores' */, 'users'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //$categorias = Categoria::all();
    //$categorias = Categoria::pluck('descripcion','id'); esto reconoce laravel colective

    /* $categorias = [
      "1" => "Vehículo",
      "2" => "Inmueble",
    ]; */

    /* $etiquetas = [
      "1" => "En promocion",
      "2" => "Negociable",
      "3" => "Nuevo",
      "4" => "Remato",
      "5" => "En Oferta",
      "6" => "Ocasión",
      "7" => "Liquidación",
      "8" => "Últimas Unidades",
    ]; */

    /* $categorias = Categoria::all(); */
    $monedas = Moneda::all();
    $condiciones = Condicion::all();
    //$estados = Estado::all();

    $categorias = Categoria::where('padre_id', null)->get();
    $subcategorias = Categoria::where('padre_id', '!=', null)->get();


    return view('anuncios.create', compact('categorias', 'subcategorias', 'monedas', 'condiciones'/* , 'estados' */));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {

    /* $request->validate([
      'titulo' => 'required',
      'descripcion' => 'required',
      'precio' => 'required ',
      'condicion_id' => 'required',
      'categoria_id' => 'required',
      'moneda_id' => 'required',
      'formFile' => 'required',
    ]); */
    date_default_timezone_set("America/La_Paz");
    /* return  $request->all(); */
    /* return  $request->file('formFile'); */
    /* $fileFormPath = $request->file('formFile')->store(); */

    /* return Storage::put('public/images/anuncios', $request->file('formFile')); */
    $anuncio = new Anuncio();

    $anuncio->titulo = $request->titulo;
    $anuncio->descripcion = $request->descripcion;
    $anuncio->precio = $request->precio;
    $anuncio->fecha_publicacion = Carbon::now(); //obtener fecha actual al crear el anuncio
    $anuncio->fecha_expiracion = Carbon::now()->addDays(30); //obtener fecha actual al crear el anuncio + los dias de duracion del anuncio
    $anuncio->visitas = 0;
    $anuncio->condicion_id = $request->condicion;
    $anuncio->categoria_id = $request->categoria;
    $anuncio->disponible = 1;  //por defecto el anuncio estara en estado disponible o no vendido
    $anuncio->habilitado = 1;  //por defecto el anuncio estara habilitado
    $anuncio->moneda_id = $request->moneda;
    $anuncio->user_id = auth()->user()->id; //id de usuario autentificado actual
    $anuncio->save();

    if ($request->file('formFile')) {
      /* $url = Storage::put('public/images/anuncios', $request->file('formFile')); */
      $url1 = Storage::put('public/images/anuncios', $request->file('formFile'));
      $anuncio->imagen()->create([
        'url' => $url1, //guardar la url de la imagen en la base de datos
      ]);
    }

    $anuncio->save();


    $bitacora = new Bitacora();
    $bitacora->usuario = Auth::user()->name;
    $bitacora->hora = now();
    $bitacora->evento = 'Crear';
    $bitacora->contexto = 'Anuncio';
    $bitacora->descripcion = 'Creó el anuncio ' . $anuncio->titulo;
    $bitacora->origen = 'Web';
    $bitacora->ip = $request->ip();
    $bitacora->save();

    return redirect()->route('anuncios.index');
    //return redirect()->route('anuncios.show', $anuncio); para previsualizar el anuncio luego de que se haya creado
  }

  /**
   * Display the specified resource.
   */
  public function show(Anuncio $anuncio, Request $request)
  {
    date_default_timezone_set("America/La_Paz");
    $bitacora = new Bitacora();
    $bitacora->usuario = Auth::user()->name;
    $bitacora->hora = now();
    $bitacora->evento = 'Crear';
    $bitacora->contexto = 'Anuncio';
    $bitacora->descripcion = 'Creó el anuncio: ' . $anuncio->titulo;
    $bitacora->origen = 'Web';
    $bitacora->ip = $request->ip();
    $bitacora->save();

    return view('anuncios.show', compact('anuncio'));
  }


  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Anuncio $anuncio)
  {
    /* $categorias = Categoria::all(); */
    $monedas = Moneda::all();
    $condiciones = Condicion::all();
    $imagen = $anuncio->imagen;

    $categorias = Categoria::where('padre_id', null)->get();
    $subcategorias = Categoria::where('padre_id', '!=', null)->get();

    return view('anuncios.edit', compact('anuncio', 'categorias', 'subcategorias', 'monedas', 'imagen', 'condiciones'));
  }


  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Anuncio  $anuncio)
  {

    $anuncio = Anuncio::find($anuncio->id);
    $anuncio->update($request->all());

    if ($request->file('formFile')) {
      $url = Storage::put('public/images/anuncios', $request->file('formFile'));


      if ($anuncio->imagen) {
        Storage::delete($anuncio->imagen->url);
        $anuncio->imagen()->update([
          'url' => $url,
        ]);
      } else {
        $anuncio->imagen()->create([
          'url' => $url,
        ]);
      }
    }

    $anuncioAux = Anuncio::find($anuncio->id);
    date_default_timezone_set("America/La_Paz");
    $bitacora = new Bitacora();
    $bitacora->usuario = Auth::user()->name;
    $bitacora->hora = now();
    $bitacora->usuario_afectado = User::find($anuncio->user_id)->name;
    $bitacora->evento = 'Actualizar';
    $bitacora->contexto = 'Anuncio';
    $bitacora->descripcion = 'Actualizó el anuncio: ' . $anuncioAux->id . ' ' . $anuncioAux->titulo . ' ' . $anuncioAux->precio . ' ' . $anuncioAux->fecha_expiracion;
    $bitacora->origen = 'Web';
    $bitacora->ip = $request->ip();
    $bitacora->save();

    return redirect()->route('anuncios.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Anuncio $anuncio, Request $request)
  {
    //
    $anuncioAux = Anuncio::find($anuncio->id);

    date_default_timezone_set("America/La_Paz");
    //activity()->useLog('Usuarios')->log('Eliminó')->subject();
    /* $lastActivity = Activity::all()->last();
    $lastActivity->subject_id = auth()->user()->id;
    $lastActivity->save(); */

    $anuncio->delete();

    date_default_timezone_set("America/La_Paz");
    $bitacora = new Bitacora();
    $bitacora->usuario = Auth::user()->name;
    $bitacora->hora = now();
    $bitacora->usuario_afectado = User::find($anuncio->user_id)->name;
    $bitacora->evento = 'Eliminar';
    $bitacora->contexto = 'Anuncio';
    $bitacora->descripcion = 'Eliminó el anuncio: ' . $anuncioAux->id . ' ' . $anuncioAux->titulo . ' ' . $anuncioAux->descripcion . ' ' . $anuncioAux->precio . ' ' . $anuncioAux->fecha_expiracion;
    $bitacora->origen = 'Web';
    $bitacora->ip = $request->ip();
    $bitacora->save();

    return redirect()->route('anuncios.index');
  }

  public function habilitar(Request  $request)
  {
    $anuncio = Anuncio::find($request->unAnuncio);
    $anuncio->habilitado = true;
    $anuncio->save();

    return redirect()->route('anuncios.index');
  }

  public function deshabilitar(Request $request)
  {
    $anuncio = Anuncio::find($request->unAnuncio);
    $anuncio->habilitado = false;
    $anuncio->save();

    return redirect()->route('anuncios.index');
  }

  public function vendido(Request $request)
  {
    $anuncio = Anuncio::find($request->unAnuncio);
    $anuncio->disponible = false;
    $anuncio->save();

    return redirect()->route('anuncios.index');
  }

  public function disponible(Request $request)
  {
    $anuncio = Anuncio::find($request->unAnuncio);
    $anuncio->disponible = true;
    $anuncio->save();

    return redirect()->route('anuncios.index');
  }

  public function exportarPDF(Request $request)
  {
    $usuario = $request->input('user');
    $categoria = $request->input('categoria');
    $desde = $request->input('desde');
    $hasta = $request->input('hasta');

    $query = Anuncio::query();

    // Aplicar filtros si se proporcionan valores
    if ($usuario !== null) {
      $query->where('user_id', $usuario);
    }
    if ($categoria !== null) {
      $query->where('categoria_id', $categoria);
    }
    if ($desde !== null && $hasta !== null) {
      $query->whereBetween('fecha_publicacion', [$desde, $hasta]);
    }

    // Obtener las bitácoras según la consulta
    $anuncios = $query->get();

    // Generar el PDF
    $pdf = new TCPDF();
    $pdf->SetCreator('YourAppName');
    $pdf->SetAuthor('YourName');
    $pdf->SetTitle('Anuncios');
    $pdf->SetSubject('Anuncios');
    $pdf->SetKeywords('Anuncios, PDF');
    $pdf->AddPage();
    $html = view('anuncios.PDF', compact('anuncios'))->render();
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('anuncios.pdf', 'D');
  }

  public function exportarExcel(Request $request)
  {
    $usuario = $request->input('user');
    $categoria = $request->input('categoria');
    $desde = $request->input('desde');
    $hasta = $request->input('hasta');

    $query = Anuncio::query();

    if ($usuario !== null) {
      $query->where('user_id', $usuario);
    }
    if ($categoria !== null) {
      $query->where('categoria_id', $categoria);
    }
    if ($desde !== null && $hasta !== null) {
      $query->whereBetween('hora', [$desde, $hasta]);
    }

    $anuncios = $query->get();

    return Excel::download(new AnuncioExport($anuncios), 'anuncios.xlsx');
  }
}
