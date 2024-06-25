@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Membresia</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>
                            @foreach ($errors->all() as $error)
                                <span class="badge badge-danger">{{ $error }}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form class="forms-sample" method="POST" action="{{ route('membresias.update', $membresia->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" id="titulo" name="titulo"
                                value="{{ $membresia->titulo }}" placeholder="Titulo">
                        </div>
                        <div class="form-group">
                            <label for="descripcion ">Descripcion</label>
                            <input type="text" class="form-control" id="titulo" name="descripcion"
                                value="{{ $membresia->descripcion }}" placeholder="Descripcion">
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio (Bolivianos)</label>
                            <input type="text" class="form-control" id="precio" name="precio"
                                value="{{ $membresia->precio }}" placeholder="Precio">
                        </div>

                        <div class="form-group">
                            <label for="duracion">Duracion (Dias)</label>
                            <input type="text" class="form-control" id="duracion" name="duracion"
                                value="{{ $membresia->duracion }}" placeholder="Precio">
                        </div>

                        <div class="form-group">
                            <label for="etiqueta">Etiquetas</label>
                            <select class="form-control" id="etiqueta" name="etiqueta">
                                <option value="1" {{ $membresia->etiqueta ? 'selected' : '' }}>Sí</option>
                                <option value="0" {{ !$membresia->etiqueta ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                        <a href="{{ route('membresias.index') }}" class="btn btn-light">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
