@extends('adminlte::page')

@section('title', 'Usuarios')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/css/responsive.bootstrap4.css">
@endsection

@section('content_header')
    <h1 class="m-0 text-dark">Usuarios</h1>
@stop

@section('content')
    <a class="btn btn-dark ml-auto" href="{{ route('anuncios.create') }}">Nuevo anuncio</a>

    {{-- <div class="card"> --}}

    {{-- <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Buscar anuncio por título">
        </div> --}}

    {{--   @if ($anuncios->count()) --}}
    <div class="card{{-- -header --}}">
        <div class="card-body">
            <table class="table table-striped" id="anuncioTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Descripcion</th>

                        {{-- <th>Categoria</th> --}}
                        <th>Precio(Bs)</th>
                        {{-- <th>Fecha Publicacion</th> --}}
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anuncios as $anuncio)
                        <tr>
                            <td>{{ $anuncio->id }}</td>
                            <td>{{ $anuncio->titulo }}</td>
                            {{-- <td>{{ $anuncio->categoria->nombre }}</td> --}}
                            <td>{{ $anuncio->descripcion }}</td>
                            <td>{{ $anuncio->precio }}</td>
                            {{-- <td>{{ $anuncio->fecha_publicacion }}</td> --}}


                            <td with="10px">
                                <a class="btn btn-warning" href="{{ route('anuncios.edit', $anuncio->id) }}">Editar</a>

                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['anuncios.destroy', $anuncio->id],
                                    'style' => 'display:inline',
                                ]) !!}
                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- <div class="card-footer">
                {{ $anuncios->links() }}
            </div> --}}
    </div>
    {{-- @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif --}}
    {{-- </div> --}}
    {{-- ------------------------------------------------------------------- --}}
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.bootstrap4.js"></script>
    <script>
        new DataTable('#usersTable', {
            responsive: true,
            autoWidth: false,

            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nada encontrado - disculpa",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    </script>

@endsection

