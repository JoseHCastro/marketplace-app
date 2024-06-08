<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required|string|max:255',
            'anuncio_id' => 'required|integer',
        ]);

        date_default_timezone_set("America/La_Paz");
        $hora=now();
        $fecha=now();
        $comentario = Comentario::create([
            'contenido' => $request->contenido,
            'hora' => $hora,
            'fecha' => $fecha,
            'user_id' => Auth::user()->id,
            'anuncio_id' => $request->anuncio_id,
        ]);

        return back();
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
