<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    // Listar categorías


    public function index()
    {
        $categorias = Categoria::with('subcategoria')->whereNull('padre_id')->get();
        return view('categoria.index', compact('categorias'));
    }

    // Mostrar formulario para crear nueva categoría
    public function create()
    {
        $categorias = Categoria::whereNull('padre_id')->get(); // Para seleccionar categorías padre
        return view('categoria.create', compact('categorias'));
    }

    // Guardar nueva categoría
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:categoria,nombre',
        ]);
        Categoria::create($request->all());

        date_default_timezone_set("America/La_Paz");
        $bitacora = new Bitacora();
        $bitacora->usuario = Auth::user()->name;
        $bitacora->hora = now();
        $bitacora->evento = 'Crear';
        $bitacora->contexto = 'Categoria';
        $bitacora->descripcion = 'Creó la categoria ' . $request->nombre;
        $bitacora->origen = 'Web';
        $bitacora->ip = $request->ip();
        $bitacora->save();

        return redirect()->route('categoria.index')->with('success', 'Categoría creada correctamente');
    }

    // Mostrar formulario de edición
    public function edit(Categoria $categoria)
    {
        $categoriasPadre = Categoria::whereNull('padre_id')->where('id', '!=', $categoria->id)->get();
        return view('categoria.edit', compact('categoria', 'categoriasPadre'));
    }

    // Actualizar categoría
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|unique:categoria,nombre,' . $categoria->id,
            'padre_id' => 'nullable|exists:categoria,id'
        ]);

        $categoria->update($request->all());

        date_default_timezone_set("America/La_Paz");
        $bitacora = new Bitacora();
        $bitacora->usuario = Auth::user()->name;
        $bitacora->hora = now();
        $bitacora->evento = 'Actualizar';
        $bitacora->contexto = 'Categoria';
        $bitacora->descripcion = 'Actualizó la categoria ' . $categoria->nombre . ' padre: ' . $categoria->padre_id . ' a ' . $request->nombre . ' padre: ' . $request->padre_id;
        $bitacora->origen = 'Web';
        $bitacora->ip = $request->ip();
        $bitacora->save();

        return redirect()->route('categoria.index')->with('success', 'Categoría actualizada correctamente');
    }

    // Eliminar categoría
    public function destroy(Categoria $categoria, Request $request)
    {
        $categoria->delete();

        date_default_timezone_set("America/La_Paz");
        $bitacora = new Bitacora();
        $bitacora->usuario = Auth::user()->name;
        $bitacora->hora = now();
        $bitacora->evento = 'Eliminar';
        $bitacora->contexto = 'Categoria';
        $bitacora->descripcion = 'Eliminó la categoria ' . $categoria->nombre . ' padre: ' . $categoria->padre_id;
        $bitacora->origen = 'Web';
        $bitacora->ip = $request->ip();
        $bitacora->save();

        return redirect()->route('categoria.index')->with('success', 'Categoría eliminada correctamente');
    }
}
