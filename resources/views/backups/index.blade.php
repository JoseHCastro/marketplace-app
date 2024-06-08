@extends('adminlte::page')
@include('components.helpButton')
@section('title', 'Gestionar Copias de Seguridad')

@section('content_header')
    <h1>Copias de Seguridad</h1>
@stop

@section('content')
    <!-- Formulario para crear un nuevo backup -->
    <form action="{{ route('backups.create') }}" method="POST">
        @csrf
        @can('crear backup')
            <button type="submit" class="btn btn-success mb-2">Crear Nuevo Respaldo</button>
        @endcan
    </form>

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

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre del Archivo</th>
                        <th>Tamaño</th>
                        <th>Fecha de Modificación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($backups as $backup)
                        <tr>
                            <td>{{ $backup['file_name'] }}</td>
                            <td>{{ number_format($backup['file_size'] / 1024, 2) }} KB</td>
                            <td>{{ \Carbon\Carbon::createFromTimestamp($backup['last_modified'])->formatLocalized('%d %B %Y %H:%M') }}
                            </td>
                            <td>
                                <!-- Formulario para eliminar un backup -->
                                @can('descargar backup')
                                    <a href="{{ route('backups.download', ['file_name' => $backup['file_name']]) }}"
                                        class="btn btn-primary btn-sm"><i class="fas fa-download"></i></a>
                                @endcan
                                <form action="{{ route('backups.delete', ['file_name' => $backup['file_name']]) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    @can('eliminar backup')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Está seguro de que desea eliminar este respaldo?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
