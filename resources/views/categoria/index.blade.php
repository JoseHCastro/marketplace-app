{{-- resources/views/categoria/index.blade.php --}}
@extends('adminlte::page')

@section('title', 'Gestionar Categorías')

@section('content_header')
    <h1 class="m-0 text-dark">Gestionar Categorías</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <a class="btn btn-dark ml-auto mb-3" href="{{ route('categoria.create') }}">Crear Nueva Categoría</a>
        @if (session('success'))
            <div class="alert alert-success" id="success-alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered" id="categorias-table">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr data-widget="expandable-table" aria-expanded="false" data-has-sub="{{ $categoria->subcategoria->isNotEmpty() ? 'yes' : 'no' }}">
                                <td>{{ $categoria->nombre }}</td>
                                <td class="text-center">
                                    <a href="{{ route('categoria.edit', $categoria->id) }}" 
                                        class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    <form action="{{ route('categoria.destroy', $categoria->id) }}" method="POST" class="delete-form" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                            <i class="fa fa-lg fa-fw fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @if ($categoria->subcategoria->isNotEmpty())
                        <tr class="expandable-body d-none">
                            <td colspan="2">
                                <div class="p-4">
                                    <table class="table table-hover m-0">
                                        <tbody>
                                            @foreach ($categoria->subcategoria as $sub)
                                            <tr>
                                                <td>{{ $sub->nombre }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('categoria.edit', $sub->id) }}" 
                                                    class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                                    </a>
                                                    <form action="{{ route('categoria.destroy', $sub->id) }}" method="POST" class="delete-form" style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                                            <i class="fa fa-lg fa-fw fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop



@push('js')
<script>
$(document).ready(function() {

    // Manejo de la tabla expandible
    $('#categorias-table').on('click', 'tr[data-widget="expandable-table"]', function() {
        if ($(this).data('has-sub') === 'yes') {
            $(this).next('.expandable-body').toggleClass('d-none');
        }
    });

    // Ocultar el mensaje de éxito después de 3 segundos
    if ($("#success-alert").length > 0) {
        setTimeout(function() {
            $("#success-alert").slideUp(500);
        }, 3000);
    }

    // Confirmación antes de la eliminación
    $('.delete-form').on('submit', function() {
        return confirm('¿Eliminar esta categoría?');
    });
});
</script>
@endpush
