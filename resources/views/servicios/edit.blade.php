@extends('adminlte::page')

@section('title', 'Editar Servicio')

@section('content_header')
    <h1 class="text-center">Editar Servicio</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('servicios.update', $servicio->id) }}">
            @csrf
            @method('PUT')

            <!-- Título del Servicio -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="titulo">Cambiar Título del Servicio</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $servicio->titulo }}">
                    @error('titulo')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Descripción -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="descripcion">Cambiar Descripción</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $servicio->descripcion }}</textarea>
                    @error('descripcion')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Precio -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="precio">Cambiar Precio</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="precio" name="precio" value="{{ $servicio->precio }}">
                    @error('precio')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Botones -->
            <div class="text-center">
                <input type="submit" value="Actualizar Servicio" class="btn btn-primary">
                <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
