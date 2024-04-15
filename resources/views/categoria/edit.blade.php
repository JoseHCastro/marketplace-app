{{-- resources/views/categoria/edit.blade.php --}}
@extends('adminlte::page')

@section('title', 'Editar Categoría')

@section('content_header')
    <h1>Editar Categoría: {{ $categoria->nombre }}</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">  {{-- Ajustar el ancho de la columna para controlar el tamaño del formulario --}}
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Actualizar Datos de la Categoría</h3>
            </div>
            <form class="forms-sample" action="{{ route('categoria.update', ['categoria' => $categoria->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" id="nombre" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" required>
                        @if ($errors->has('nombre'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nombre') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="padre_id">Categoría Padre (opcional):</label>
                        <select class="form-control" name="padre_id" id="padre_id">
                            <option value="">Categoría padre</option>
                            @foreach ($categoriasPadre as $catPadre)
                                <option value="{{ $catPadre->id }}" {{ $catPadre->id == $categoria->padre_id ? 'selected' : '' }}>
                                    {{ $catPadre->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('categoria.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
