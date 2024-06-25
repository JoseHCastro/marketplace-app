<?php

namespace App\Http\Controllers;

use App\Models\Membresia;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;

class MembresiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $membresias = Membresia::all();
        //dd($membresias);
        return view('membresias.index', compact('membresias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $membresias = Membresia::all();
        return view('membresias.create', compact('membresias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'duracion' => 'required|integer',
            'etiqueta' => 'required|boolean',
        ]);

        $membresia = new Membresia();
        $membresia->titulo = $request->titulo;
        $membresia->descripcion = $request->descripcion;
        $membresia->precio = $request->precio;
        $membresia->duracion = $request->duracion;
        $membresia->etiqueta = $request->etiqueta;
        $membresia->save();

        // Bitacora
        date_default_timezone_set("America/La_Paz");
        $bitacora = new Bitacora();
        $bitacora->usuario = Auth::user()->name;
        $bitacora->hora = now();
        $bitacora->evento = 'Crear';
        $bitacora->contexto = 'Mmebresia';
        $bitacora->descripcion = 'Creó la Membresia: ' . $request->titulo .' con la descripcion: ' . $request->descripcion . ' y el con precio: ' . $request->precio;
        $bitacora->origen = 'Web';
        $bitacora->ip = $request->ip();
        $bitacora->save();

        return redirect()->route('membresias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Membresia $membresia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $membresia = Membresia::find($id);

        return view('membresias.edit', compact('membresia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'duracion' => 'required|integer',
            'etiqueta' => 'required|boolean',
        ]);

        $membresia = Membresia::find($id);
        //dd($request);
        $membresia->titulo = $request->titulo;
        $membresia->descripcion = $request->descripcion;
        $membresia->precio = $request->precio;
        $membresia->duracion = $request->duracion;
        $membresia->etiqueta = $request->etiqueta;
        $membresia->save();

        // bitacora
        $membresiaAux = Membresia::find($id);
        date_default_timezone_set("America/La_Paz");
        $bitacora = new Bitacora();
        $bitacora->usuario = Auth::user()->name;
        $bitacora->hora = now();
        $bitacora->evento = 'Actualizar';
        $bitacora->contexto = 'Membresia';
        $bitacora->descripcion = 'Actualizó la Membresia: ' . $membresiaAux->titulo . 'con la descripcion: ' .$membresiaAux->descripcion .' y con precio: ' . $membresiaAux->precio . ' a ' . $membresia->titulo . ' con la descripcion: ' .$membresia->descripcion .' y con precio: ' . $membresia->precio;
        $bitacora->origen = 'Web';
        $bitacora->ip = $request->ip();
        $bitacora->save();

        return redirect()->route('membresias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
        $membresia = Membresia::find($id);
        $membresiaAux = Membresia::find($id);

        $membresia->delete();

        // bitacora
        date_default_timezone_set("America/La_Paz");
        $bitacora = new Bitacora();
        $bitacora->usuario = Auth::user()->name;
        $bitacora->hora = now();
        $bitacora->evento = 'Eliminar';
        $bitacora->contexto = 'Membresia';
        $bitacora->descripcion = 'Eliminó la Membresia: ' . $membresiaAux->name . 'con la descripcion: ' .$membresiaAux->descripcion .' y con precio: ' . $membresiaAux->precio;
        $bitacora->origen = 'Web';
        $bitacora->ip = $request->ip();
        $bitacora->save();

        return redirect()->route('membresias.index');
    }
}
