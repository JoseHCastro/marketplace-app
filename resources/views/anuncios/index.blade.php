@extends('adminlte::page')
@include('components.helpButton')
@section('title', 'Anuncio')
@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/css/responsive.bootstrap4.css">
    {{-- BOTONES: VISIBILIDAD DE COLUMNAS y EXPORTAR --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
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
    @canany(['reporte anuncio pdf', 'reporte anuncio excel'])
        {{-- REPORTE INICIO --}}
        <div class="card">
            <div class="card-body">
                <h2>Reportes</h2>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="user">Usuario:</label>
                        @role('administrador')
                            <select name="user" id="user" class="form-control">
                                <option value="">Seleccionar usuario...</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        @endrole
                        @role('usuario')
                            <p>{{ auth()->user()->name }}</p>
                        @endrole
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="categoria">Categoría:</label>
                        <select name="categoria" id="categoria" class="form-control">
                            <option value="">Seleccionar Categoría...</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="desde">Desde:</label>
                        <input type="datetime-local" name="desde" id="desde" class="form-control" placeholder="Desde">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="hasta">Hasta:</label>
                        <input type="datetime-local" name="hasta" id="hasta" class="form-control" placeholder="Hasta">
                    </div>

                    <div class="col-md-3">
                        @can('reporte anuncio pdf')
                            <button class="btn btn-dark ml-auto mb-3" onclick="exportarPDF()">PDF</button>
                        @endcan
                        @can('reporte anuncio excel')
                            <button class="btn btn-dark ml-auto mb-3" onclick="exportarExcel()">Excel</button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        {{-- REPORTE FINAL --}}
    @endcanany

    {{-- ------------------------------------------------------------------- --}}
    @can('crear anuncio')
        <a class="btn btn-dark ml-auto" href="{{ route('anuncios.create') }}">Nuevo anuncio</a>
    @endcan




    <div class="card{{-- -header --}}">
        <div class="card-body">
            <table class="table table-striped" id="anuncioTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Imagen</th>
                        <th>Detalle</th>
                        <th>Categorias</th>

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
                                        /* echo $anuncio->imagen->url; */
                                    } else {
                                        echo "https://wpdirecto.com/wp-content/uploads/2017/08/alt-de-una-imagen.png";
                                      } @endphp"
                                        style="width: 100px; height: 100px;" class="rounded mx-auto d-block">

                                </div>
                            </td>
                            <td>
                                <h5>{{ $anuncio->titulo }}</h5>

                                <p>Visitas: {{ $anuncio->visitas }}</p>

                                @php
                                    if ($anuncio->disponible === 0) {
                                        echo ' <strong style="color:red">| Vendido </strong>';
                                    }
                                    /* if ($anuncio->precio !== null && isset($anuncio->precio)) {
                                            echo "Precio: $" . $anuncio->precio;
                                        } else {
                                            echo 'Precio: No especificado';
                                        } */
                                @endphp

                                @php
                                    if ($anuncio->habilitado === 0) {
                                        echo ' <strong style="color:red"> | No publicado  </strong>';
                                    }
                                @endphp


                            </td>
                            <td>
                                <p><strong>Categoria:</strong> {{ $categorias[$anuncio->categoria->padre_id - 1]->nombre }}
                                </p>
                                <p><strong>Subcategoria:</strong> {{ $anuncio->categoria->nombre }} </p>
                            </td>
                            <td>{{ $anuncio->fecha_publicacion }}</td>
                            <td>{{ $anuncio->fecha_expiracion }}</td>

                            <td with="10px">

                                {{-- <form action="{{ route('anuncios.edit', $anuncio) }}">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </form> --}}
                                @can('editar anuncio')
                                    <a class="btn btn-warning" href="{{ route('anuncios.edit', $anuncio->id) }}">Editar</a>
                                @endcan

                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['anuncios.destroy', $anuncio->id],
                                    'style' => 'display:inline',
                                ]) !!}
                                @can('eliminar anuncio')
                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                @endcan
                                {!! Form::close() !!}

                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                    <div class="btn-group" role="group">
                                        @can('mas acciones anuncio')
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Más acciones
                                            </button>
                                        @endcan
                                        <ul class="dropdown-menu">

                                            <form action="{{ route('anuncios.habilitar') }}" method="post">
                                                @csrf


                                                <input type="text" name="unAnuncio" id=""
                                                    value="{{ $anuncio->id }}" hidden>
                                                <button type="submit" class="dropdown-item">
                                                    Publicar
                                                </button>
                                            </form>

                                            {{-- <li>
                                                <a class="dropdown-item" href="#">Habilitar</a>
                                            </li> --}}

                                            <form action="{{ route('anuncios.deshabilitar') }}" method="post">
                                                @csrf
                                                <input type="text" name="unAnuncio" id=""
                                                    value="{{ $anuncio->id }}" hidden>
                                                <button type="submit" class="dropdown-item">
                                                    No publicar
                                                </button>
                                            </form>


                                            <form action="{{ route('contenido_promocional.show', $anuncio) }}"
                                                method="get">

                                                <button type="submit" class="dropdown-item">
                                                    Mejorar anuncio
                                                </button>
                                            </form>


                                            <form action="{{ route('anuncios.vendido') }}" method="post">
                                                @csrf
                                                <input type="text" name="unAnuncio" id=""
                                                    value="{{ $anuncio->id }}" hidden>
                                                <button type="submit" class="dropdown-item">
                                                    Vendido
                                                </button>
                                            </form>

                                            <form action="{{ route('anuncios.disponible') }}" method="post">
                                                @csrf
                                                <input type="text" name="unAnuncio" id=""
                                                    value="{{ $anuncio->id }}" hidden>
                                                <button type="submit" class="dropdown-item">
                                                    No vendido
                                                </button>
                                            </form>


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
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.bootstrap4.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- VISIBILIDAD DE COLUMNAS --}}
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js"></script>
    {{-- EXPORTAR --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

    <script>
        new DataTable('#anuncioTable', {
            layout: {
                topStart: {
                    buttons: [{
                        extend: 'colvis',
                        collectionLayout: 'fixed columns',
                        popoverTitle: 'Column visibility control'
                    }, 'copy', 'csv', 'excel', 'pdf', 'print']
                }
            },
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

<script>
    function exportarPDF() {
        var userElement = document.getElementById('user');
        var user = userElement ? userElement.value : '{{ auth()->user()->id }}';
        var categoria = document.getElementById('categoria').value || '';
        var desde = document.getElementById('desde').value || '';
        var hasta = document.getElementById('hasta').value || '';

        window.location = '/anuncios/exportar-pdf?user=' + user + '&categoria=' + categoria + '&desde=' + desde + '&hasta=' + hasta;
    }

    function exportarExcel() {
        var userElement = document.getElementById('user');
        var user = userElement ? userElement.value : '{{ auth()->user()->id }}';
        var categoria = document.getElementById('categoria').value || '';
        var desde = document.getElementById('desde').value || '';
        var hasta = document.getElementById('hasta').value || '';

        window.location = '/anuncios/exportar-excel?user=' + user + '&categoria=' + categoria + '&desde=' + desde + '&hasta=' + hasta;
    }
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
