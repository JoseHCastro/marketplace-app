<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etiquetas = Etiqueta::all();
        //dd($etiquetas);
        return view('etiquetas.index', compact('etiquetas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etiquetas = Etiqueta::all();
        return view('etiquetas.create', compact('etiquetas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'precio' => 'required', 'double',
        ]);

        $etiqueta = new Etiqueta();
        $etiqueta->name = $request->name;
        $etiqueta->precio = $request->precio;
        $etiqueta->save();

        date_default_timezone_set("America/La_Paz");
        $bitacora = new Bitacora();
        $bitacora->usuario = Auth::user()->name;
        $bitacora->hora = now();
        $bitacora->evento = 'Crear';
        $bitacora->contexto = 'Etiqueta';
        $bitacora->descripcion = 'Creó la Etiqueta: ' . $request->name . ' con precio: ' . $request->precio;
        $bitacora->origen = 'Web';
        $bitacora->ip = $request->ip();
        $bitacora->save();

        return redirect()->route('etiquetas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etiqueta $etiqueta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $etiqueta = Etiqueta::find($id);

        return view('etiquetas.edit', compact('etiqueta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'precio' => 'required', 'double',
        ]);

        $etiqueta = Etiqueta::find($id);
        //dd($request);
        $etiqueta->name = $request->name;
        $etiqueta->precio = $request->precio;
        $etiqueta->save();

        $etiquetaAux = Etiqueta::find($id);
        date_default_timezone_set("America/La_Paz");
        $bitacora = new Bitacora();
        $bitacora->usuario = Auth::user()->name;
        $bitacora->hora = now();
        $bitacora->evento = 'Actualizar';
        $bitacora->contexto = 'Etiqueta';
        $bitacora->descripcion = 'Actualizó la Etiqueta: ' . $etiquetaAux->name . ' con precio: ' . $etiquetaAux->precio . ' a ' . $etiqueta->name . ' con precio: ' . $etiqueta->precio;
        $bitacora->origen = 'Web';
        $bitacora->ip = $request->ip();
        $bitacora->save();

        return redirect()->route('etiquetas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
        $etiqueta = Etiqueta::find($id);
        $etiquetaAux = Etiqueta::find($id);

        $etiqueta->delete();

        date_default_timezone_set("America/La_Paz");
        $bitacora = new Bitacora();
        $bitacora->usuario = Auth::user()->name;
        $bitacora->hora = now();
        $bitacora->evento = 'Eliminar';
        $bitacora->contexto = 'Etiqueta';
        $bitacora->descripcion = 'Eliminó la Etiqueta: ' . $etiquetaAux->name . ' con precio: ' . $etiquetaAux->precio;
        $bitacora->origen = 'Web';
        $bitacora->ip = $request->ip();
        $bitacora->save();

        return redirect()->route('etiquetas.index');
    }
}
