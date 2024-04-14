@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar post</h1>
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

                    <form class="forms-sample" method="POST" action="{{ route('anuncios.update', $anuncio->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" id="titulo" name="titulo"
                                value="{{ $anuncio->titulo }}" placeholder="Titulo">
                        </div>

                        <div class="form-group">
                            <label for="email">Descripcion</label>
                            <input type="descripcion" class="form-control" id="descripcion" name="descripcion"
                                value="{{ $anuncio->descripcion }}" placeholder="Descripcion">
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="precio" class="form-control" id="precio" name="precio"
                                value="{{ $anuncio->precio }}">
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                        <a class="btn btn-primary mr-2" href="{{ route('anuncios.index') }}">Cancelar</a>
                        {{-- <button class="btn btn-light" type="submit">Cancelar</button> --}}
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
