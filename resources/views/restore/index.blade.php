@extends('adminlte::page')
@include('components.helpButton')
@section('title', 'Restaurar Copias de Seguridad')

@section('content_header')
    <h1>Restaurar Copias de Seguridad</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Subir Backup para Restauración -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Subir Backup para Restauración</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('restore.upload') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="backup_file">Archivo de Backup:</label>
                    <input type="file" class="form-control" name="backup_file" required>
                </div>
                @can('restore')
                    <button type="submit" class="btn btn-primary">Subir y Restaurar</button>
                @endcan
            </form>
        </div>
    </div>

    <!-- Restaurar desde Backup Existente -->
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Restaurar desde Backup Existente</h3>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($backups as $backup)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h5>{{ $backup['file_name'] }}</h5>
                            <p><small>Tamaño: {{ number_format($backup['file_size'] / 1024 / 1024, 2) }} MB</small></p>
                            <p><small>Modificado:
                                    {{ \Carbon\Carbon::createFromTimestamp($backup['last_modified'])->toDateTimeString() }}</small>
                            </p>
                        </div>
                        @can('restore')
                            <a href="{{ route('restore.perform', ['file_name' => $backup['file_name']]) }}"
                                class="btn btn-warning btn-sm"
                                onclick="return confirm('¿Está seguro de que desea restaurar este archivo?')">
                                Restaurar
                            </a>
                        @endcan
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@stop
