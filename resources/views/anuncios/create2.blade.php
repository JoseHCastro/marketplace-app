@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear anuncio</h1>
@stop

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                {!! Form::open(['route' => 'anuncios.store', 'autocomplete' => 'off']) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                <div class="form-group">
                    {!! Form::label('titulo', 'Título') !!}
                    {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título del anuncio']) !!}

                    @error('titulo')
                        <small class="alert-danger">{{ $message }}</small>
                    @enderror
                </div>



                {{-- <div class="form-group">
                {!! Form::label('categoria_id', 'Categoría') !!}
                {!! Form::select('categoria_id', $categorias, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Seleccione la categoría del anuncio',
                ]) !!}

                 @error('categoria_id')
                    <small class="alert-danger">{{ $message }}</small>
                @enderror
            </div> --}}

                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripción') !!}
                    {!! Form::textarea('descripcion', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Ingrese la descripción del anuncio',
                    ]) !!}

                    @error('descripcion')
                        <small class="alert-danger">{{ $message }}</small>
                    @enderror
                </div>



                <div class="form-group">
                    {!! Form::label('precio', 'Precio') !!}
                    {!! Form::text('precio', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Ingrese el precio',
                    ]) !!}

                    @error('precio')
                        <small class="alert-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- <div class="form-group">
                {!! Form::label('estado', 'Estado') !!}
                {!! Form::select('estado', ['usado' => 'Usado', 'nuevo' => 'Nuevo'], null, [
                    'class' => 'form-control',
                    'placeholder' => 'Seleccione el estado',
                ]) !!}

                @error('estado')
                    <small class="alert-danger">{{ $message }}</small>
                @enderror
            </div> --}}

                {{-- <div class="form-group">
                <p class="font-weight-bold">Estado del anuncio</p>
                <label for="">
                    {!! Form::checkbox('estadoanuncio', 1, true) !!}
                    Borrador
                </label>

                <label for="">
                    {!! Form::checkbox('estadoanuncio', 2, false) !!}
                    Publicado
                </label>

                @error('estadoanuncio')
                    <small class="alert-danger">{{ $message }}</small>
                @enderror
            </div> --}}

                {{-- <div class="form-group">
                {!! Form::label('imagen', 'Imagen') !!}
                {!! Form::file('imagen', ['class' => 'form-control']) !!}
            </div> --}}


                {!! Form::submit('Crear anuncio', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js"></script>

    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");

        ClassicEditor
            .create(document.querySelector('#descripcion'))
            .catch(error => {
                console.error(error);
            });
    </script>
@stop
