<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoryController extends Controller
{
    // Listar categorías
    public function index() {
        $categorias = Categoria::with('subcategoria')->whereNull('padre_id')->get();
        return view('categoria.index', compact('categorias'));
    }

    // Mostrar formulario para crear nueva categoría
    public function create() {
        $categorias = Categoria::whereNull('padre_id')->get(); // Para seleccionar categorías padre
        return view('categoria.create', compact('categorias'));
    }

    // Guardar nueva categoría
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|unique:categoria,nombre',
        ]);
        Categoria::create($request->all());
        return redirect()->route('categoria.index')->with('success', 'Categoría creada correctamente');
    }

    // Mostrar formulario de edición
    public function edit(Categoria $categoria) {
        $categoriasPadre = Categoria::whereNull('padre_id')->where('id', '!=', $categoria->id)->get();
        return view('categoria.edit', compact('categoria', 'categoriasPadre'));
    }

    // Actualizar categoría
    public function update(Request $request, Categoria $categoria) {
        $request->validate([
            'nombre' => 'required|unique:categoria,nombre,' . $categoria->id,
            'padre_id' => 'nullable|exists:categoria,id'
        ]);
    
        $categoria->update($request->all());
        return redirect()->route('categoria.index')->with('success', 'Categoría actualizada correctamente');
    }

    // Eliminar categoría
    public function destroy(Categoria $categoria) {
        $categoria->delete();
        return redirect()->route('categoria.index')->with('success', 'Categoría eliminada correctamente');
    }
}
