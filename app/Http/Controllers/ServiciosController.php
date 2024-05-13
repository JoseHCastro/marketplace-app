<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiciosRequest;
use App\Models\Bitacora;
use App\Models\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $filterValue = $request->input('filterValue');

        $serviciosFilter = Servicios::where('titulo', 'LIKE', '%' . $filterValue . '%');

        $servicios = $serviciosFilter->simplePaginate(5);

        return view('servicios.index', [
            'servicios' => $servicios,
            'filterValue' => $filterValue,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiciosRequest $request)
    {
        $servicio = $request->all();

        Servicios::create($servicio);

        date_default_timezone_set("America/La_Paz");
        $bitacora = new Bitacora();
        $bitacora->usuario = Auth::user()->name;
        $bitacora->hora = now();
        $bitacora->evento = 'Crear';
        $bitacora->contexto = 'Servicio';
        $bitacora->descripcion = 'Creó el Servicio: ' . $request->titulo . ' descripción: ' . $request->descripcion . ' precio: ' . $request->precio;
        $bitacora->origen = 'Web';
        $bitacora->ip = $request->ip();
        $bitacora->save();

        return redirect()->action([ServiciosController::class, 'index'])
            ->with('success-create', 'Servicio creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicios $servicios)
    {
        return view('servicios.show', compact('servicios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicios $servicio)
    {
        return view('servicios.edit', compact('servicio'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ServiciosRequest $request, Servicios $servicio)
    {
        $servicio->titulo = $request->titulo;
        $servicio->descripcion = $request->descripcion;
        $servicio->precio = $request->precio;
        $servicio->save();

        return redirect()->action([ServiciosController::class, 'index'])
            ->with('success-editar', 'Servicio editado con éxito');
    }


    public function destroy(Servicios $servicio)
    {
        $servicio->delete();

        return redirect()->action([ServiciosController::class, 'index'])
            ->with('success-eliminar', 'Servicio eliminadoo con éxito');
    }
}
