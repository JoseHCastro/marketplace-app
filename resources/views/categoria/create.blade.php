{{-- resources/views/categoria/create.blade.php --}}
@extends('adminlte::page')

@section('title', 'Crear Categoría')

@section('content_header')
    <h1 class="m-0 text-dark">Crear Nueva Categoría</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Nueva Categoría</h3>
            </div>
            <form action="{{ route('categoria.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" id="nombre" name="nombre" placeholder="Nombre de la categoría" required value="{{ old('nombre') }}">
                        @if ($errors->has('nombre'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nombre') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="padre_id">Categoría Padre (opcional):</label>
                        <select class="form-control" name="padre_id" id="padre_id">
                            <option value="">Categoria padre</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar Categoría</button>
                    <a href="{{ route('categoria.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
