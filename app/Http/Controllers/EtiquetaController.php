<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etiquetas = Etiqueta::all();
        //dd($etiquetas);
        return view('etiquetas.index',compact('etiquetas'));
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

        return view('etiquetas.edit',compact('etiqueta'));
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
        return redirect()->route('etiquetas.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $etiqueta = Etiqueta::find($id);

        $etiqueta->delete();

        return redirect()->route('etiquetas.index');
    }
}
