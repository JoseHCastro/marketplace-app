@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <h1 class="m-0 text-dark">Crear Membresia</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form class="forms-sample" method="POST" action="{{ route('membresias.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion">
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio en Bolivianos">
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                        <a href="{{ route('membresias.index') }}" class="btn btn-light">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
