@extends('adminlte::page')
@include('components.helpButton')
@section('title', 'Bitácora')
@section('css')
    {{-- TABLA RESPONSIVE --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/css/responsive.bootstrap4.css">
    {{-- BOTONES: VISIBILIDAD DE COLUMNAS y EXPORTAR --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">

@endsection
@section('content_header')
    <h1 class="m-0 text-dark">Bitácora</h1>
@stop
@section('content')

    <div class="card">
        <div class="card-body">
            <h2>Reportes</h2>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="user">Usuario:</label>
                    <select name="user" id="user" class="form-control">
                        <option value="">Seleccionar usuario...</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="plataforma">Plataforma:</label>
                    <select name="plataforma" id="plataforma" class="form-control">
                        <option value="">Seleccionar Plataforma...</option>
                        <option value="Web">Web</option>
                        <option value="Movil">Movil</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="desde">Desde:</label>
                    <input type="date" name="desde" id="desde" class="form-control" placeholder="Desde">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="hasta">Hasta:</label>
                    <input type="date" name="hasta" id="hasta" class="form-control" placeholder="Hasta">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-dark ml-auto mb-3" onclick="exportarPDF()">PDF</button>
                    <button class="btn btn-dark ml-auto mb-3" onclick="exportarPDF()">Excel</button>
                </div>
            </div>
        </div>
    </div>




    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="usersTable">
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>Usuario</th>
                        <th>Usuario afectado</th>
                        <th>Evento</th>
                        <th>Contexto</th>
                        <th>Descripción</th>
                        <th>Origen</th>
                        <th>Dirección IP</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            <td>{{ $registro->hora }}</td>
                            <td>{{ $registro->usuario }}</td>
                            <td>{{ $registro->usuario_afectado }}</td>
                            <td>{{ $registro->evento }}</td>
                            <td>{{ $registro->contexto }}</td>
                            <td>{{ $registro->descripcion }}</td>
                            <td>{{ $registro->origen }}</td>
                            <td>{{ $registro->ip }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    {{-- TABLA RESPONSIVE --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.bootstrap4.js"></script>
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
        new DataTable('#usersTable', {
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
            var user = document.getElementById('user').value || null;
            var plataforma = document.getElementById('plataforma').value || null;
            var desde = document.getElementById('desde').value || null;
            var hasta = document.getElementById('hasta').value || null;
        }
    </script>

@endsection
