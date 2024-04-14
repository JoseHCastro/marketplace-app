@extends('adminlte::page')

@section('title', 'Gestionar apariencia de Anuncios')

@section('content_header')
    <h1 class="text-center">Gestionar Servicios</h1>
@stop

@section('content')
     @if (session('success-create'))
        <div class="alert alert-primary text-center">
            {{ session('success-create') }}
        </div>
     @elseif (session('success-update'))
       <div class="alert alert-success text-center">
         {{ session('success-update') }}
       </div>
     @elseif (session('success-delete'))
       <div class="alert alert-warning text-center">
         {{ session('success-delete') }}
       </div>
     @endif

    <div class="card">
        <div class="card-header container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <a href="{{ route('servicios.create') }}" class="btn btn-primary"><b>Agregar servicio</b></a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <form action="{{ route('servicios.index') }}" method="GET">
                        <div class="mb-3 row">
                            <div>
                                <input type="text" name="filterValue" placeholder="Buscar por nombre de servicio" class="form-control rounded border-primary text-secondary">
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-info">
                                    <b>Buscar</b>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th class="text-center" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicios as $servicio)
                        <tr>
                            <td><b>{{ $servicio->id }}</b></td>
                            <td><b>{{ $servicio->titulo }}</b></td>
                            <td><b>{{ $servicio->descripcion }}</b></td>
                            <td><b>{{ $servicio->precio }}</b></td>
                            <td width="5px">
                                <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-primary btn-sm mb-2">Editar</a>
                            </td>
                            <td width="5px">
                                <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Eliminar" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer eliminar este servicio?')">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center mt-3">
                {{ $servicios->appends(['filterValue' => $filterValue])->links() }}
            </div>
        </div>
    </div>
@endsection
