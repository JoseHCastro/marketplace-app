<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Buscar anuncio por título">
    </div>

    @if ($anuncios->count())
        <div class="card-header">
            <div class="card-body">
                <table class="table table-striped">
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
                                    <a class="btn btn-warning"
                                        href="{{ route('anuncios.edit', $anuncio->id) }}">Editar</a>

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

            <div class="card-footer">
                {{ $anuncios->links() }}
            </div>
        </div>
    @else
        <div class="card-body">
            <strong>No hay registros</strong>
        </div>
    @endif
</div>
