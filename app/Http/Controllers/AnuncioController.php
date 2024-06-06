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
    public function index(Request $request)
  {
    $filtro = $request->filtro;
    $categoria_id = $request->categoria_id;

    $query = Anuncio::query();

    if (auth()->user()->id !== 7) {
        $query->where('user_id', auth()->user()->id);
    }

    if ($filtro) {
        $query->whereHas('categoria', function ($query) use ($filtro) {
            $query->where('nombre', 'like', '%' . $filtro . '%');
        });
    }

    if ($categoria_id) {
        $query->where('categoria_id', $categoria_id);
    }

    $anuncios = $query->get();
    $categorias = Categoria::all();
    $users = User::all();

    return view('anuncios.index', compact('anuncios', 'categorias', 'users'));
  }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $monedas = Moneda::all();
        $condiciones = Condicion::all();
        $categorias = Categoria::where('padre_id', null)->get();
        $subcategorias = Categoria::where('padre_id', '!=', null)->get();

        return view('anuncios.create', compact('categorias', 'subcategorias', 'monedas', 'condiciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        date_default_timezone_set("America/La_Paz");
        $anuncio = new Anuncio();

        $ultimaPosicionPrincipal = Anuncio::max('posicion_principal');
        $nuevaPosicionPrincipal = $ultimaPosicionPrincipal + 1;

        $ultimaPosicionCategoria = Anuncio::max('posicion_categoria');
        $nuevaPosicionCategoria = $ultimaPosicionCategoria + 1;

        $anuncio->titulo = $request->titulo;
        $anuncio->descripcion = $request->descripcion;
        $anuncio->precio = $request->precio;
        $anuncio->fecha_publicacion = Carbon::now();
        $anuncio->fecha_expiracion = Carbon::now()->addDays(30);
        $anuncio->visitas = 0;
        $anuncio->condicion_id = $request->condicion;
        $anuncio->categoria_id = $request->categoria;
        $anuncio->disponible = 1;
        $anuncio->habilitado = 1;
        $anuncio->descuento = 0;
        $anuncio->moneda_id = $request->moneda;
        $anuncio->user_id = auth()->user()->id;

        $anuncio->posicion_principal = $nuevaPosicionPrincipal;
        $anuncio->posicion_categoria = $nuevaPosicionCategoria;

        $anuncio->save();

        if ($request->file('formFile')) {
            $url1 = Storage::put('public/images/anuncios', $request->file('formFile'));
            $anuncio->imagen()->create([
                'url' => $url1,
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
        $anuncioAux = Anuncio::find($anuncio->id);

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

        if ($usuario !== null) {
            $query->where('user_id', $usuario);
        }
        if ($categoria !== null) {
            $query->where('categoria_id', $categoria);
        }
        if ($desde !== null && $hasta !== null) {
            $query->whereBetween('fecha_publicacion', [$desde, $hasta]);
        }

        $anuncios = $query->get();

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
    public function anunciosPorCategoria($categoriaId)
    {
        $anuncios = Anuncio::where('categoria_id', $categoriaId)->get();
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('anuncios.anunciosPorCategoria', compact('anuncios', 'categorias'));

    }







}
