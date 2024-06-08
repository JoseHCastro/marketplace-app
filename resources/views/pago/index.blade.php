{{-- resources/views/pago/index.blade.php --}}
@extends('adminlte::page')
@include('components.helpButton')
@section('title', 'Listado de Pagos')

@section('css')
    {{-- TABLA RESPONSIVE --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/css/responsive.bootstrap4.css">
    {{-- BOTONES: VISIBILIDAD DE COLUMNAS y EXPORTAR --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
@endsection

@section('content_header')
    <h1 class="m-0 text-dark">Listado de Pagos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Filtros</h2>
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
                    <label for="fecha_desde">Desde:</label>
                    <input type="date" name="fecha_desde" id="fecha_desde" class="form-control" placeholder="Desde">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="fecha_hasta">Hasta:</label>
                    <input type="date" name="fecha_hasta" id="fecha_hasta" class="form-control" placeholder="Hasta">
                </div>
                <div class="col-md-3 mb-3">
                    <button class="btn btn-dark ml-auto mb-3" onclick="filtrarPagos()">Filtrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="pagosTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha de Pago</th>
                        <th>Monto</th>
                        <th>Anuncio</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>ID de Stripe</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($pagos as $pago)
                        <tr>
                            <td>{{ $pago->id }}</td>
                            <td>{{ $pago->fecha_pago }}</td>
                            <td>{{ $pago->monto }}</td>
                            <td>{{ $pago->anuncio->titulo }}</td>
                            <td>{{ $pago->user->name }}</td>
                            <td>{{ $pago->user->email }}</td>
                            <td>{{ $pago->stripe_payment_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

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
        new DataTable('#pagosTable', {
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

        function filtrarPagos() {
            var user = document.getElementById('user').value || '';
            var fechaDesde = document.getElementById('fecha_desde').value || '';
            var fechaHasta = document.getElementById('fecha_hasta').value || '';

            window.location = '/pago?user=' + user + '&fecha_desde=' + fechaDesde + '&fecha_hasta=' + fechaHasta;
        }
    </script>
@stop
