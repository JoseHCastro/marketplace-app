@extends('adminlte::page')
@include('components.helpButton')
@section('title', 'Usuarios')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/css/responsive.bootstrap4.css">
@endsection
@section('content_header')
    <h1 class="m-0 text-dark">Bitacora</h1>
@stop
@section('content')
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
