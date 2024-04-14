@extends('adminlte::page')

@section('title', 'Anuncio')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('anuncios.create') }}">Nuevo anuncio</a>

    <h1>Listado de anuncios</h1>
@stop

@section('content')

    @livewire('admin.anuncio-index')
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
