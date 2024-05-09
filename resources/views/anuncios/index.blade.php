@extends('adminlte::page')

@section('title', 'Anuncio')
@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/css/responsive.bootstrap4.css">
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            /* width: 100%;
                                                                                                                                                                                                                                height: 100%; */
        }
    </style>
@endsection

@section('content_header')
    <h1 class="m-0 text-dark">Listado de anuncios</h1>
@stop

@section('content')
    {{-- ------------------------------------------------------------------- --}}

    <a class="btn btn-dark ml-auto" href="{{ route('anuncios.create') }}">Nuevo anuncio</a>

    {{-- <a class="btn btn-dark ml-auto" id="btnVisitar">un boton</a> --}}

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
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>Categoria</th>

                        {{-- <th>Categoria</th> --}}
                        <th>Desde</th>
                        <th>Hasta</th>

                        {{-- <th>Fecha Publicacion</th> --}}
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($anuncios as $anuncio)
                        <tr>
                            <td>{{ $anuncio->id }}</td>
                            <td>
                                <div>
                                    <img src=" 
                                    @php
if(($anuncio->imagen !== null) && isset($anuncio->imagen->url)){
                                        echo Storage::url($anuncio->imagen->url);
                                    } else { 
                                        echo "https://wpdirecto.com/wp-content/uploads/2017/08/alt-de-una-imagen.png";
                                      } @endphp"
                                        style="width: 100px; height: 100px;" class="rounded mx-auto d-block">

                                </div>
                            </td>
                            <td>{{ $anuncio->titulo }}</td>
                            <td>{{ $anuncio->categoria->nombre }}</td>
                            <td>{{ $anuncio->fecha_publicacion }}</td>
                            <td>{{ $anuncio->fecha_expiracion }}</td>

                            <td with="10px">
                                <a class="btn btn-warning" href="{{ route('anuncios.edit', $anuncio->id) }}">Editar</a>

                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['anuncios.destroy', $anuncio->id],
                                    'style' => 'display:inline',
                                ]) !!}
                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}


                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Más acciones
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Habilitar</a></li>
                                            <li><a class="dropdown-item" href="#">Deshabilitar</a></li>

                                            <form action="contenido_promocional.index" method="get">
                                                @csrf
                                                <input {{-- name="id_anuncios" --}} value="{{ $anuncio->id }}"hidden>

                                                <button type="submit" class="dropdown-item">
                                                    <a href="{{ route('contenido_promocional.show', $anuncio) }}"> Mejorar
                                                        anuncio</a>
                                                </button>
                                            </form>

                                            <li><a class="dropdown-item" href="#">Vendido</a></li>
                                            <li><a class="dropdown-item" href="#">No venido</a></li>
                                        </ul>
                                    </div>
                                </div>


                                {{-- <button class="btn btn-primary">Mas acciones</button> --}}
                            </td>
                            {{-- <td>{{ $colores['1'] }}</td>
                            <td>{{ $colores[1] }}</td> --}}
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
@stop


@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.bootstrap4.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        new DataTable('#anuncioTable', {
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


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('btnVisitar').addEventListener('click', function() {
            axios.post("{{ route('anuncios.index') }}")
                .then(function(response) {

                    console.log(response);
                })
                .catch(function(error) {

                    console.log(error);
                });
        });
    </script>
@stop
