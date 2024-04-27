@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <h1 class="m-0 text-dark">Crear anuncio</h1>
@stop
@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
@stop


@section('js')

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js"></script> --}}

    {{-- <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");

        ClassicEditor
            .create(document.querySelector('#descripcion'))
            .catch(error => {
                console.error(error);
            });
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stop

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {{-- ------------------------------inicio formulario------------------------------------ --}}
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            {{-- <div class="card-header">
                                <h3 class="card-title">Nueva Categoría</h3>
                            </div> --}}
                            <form action="{{ route('anuncios.store') }}" method="POST">
                                @csrf
                                <div class="card-body">

                                    {{-- <div class="form-group">
                                        <label for="padre_id">Categoría Padre (opcional):</label>
                                        <select class="form-control" name="padre_id" id="padre_id">
                                            <option value="">Categoria padre</option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}

                                    {{-- input para seleccionar categoria --}}
                                    <div {{-- class="form-group" --}}>
                                        <label {{-- for="padre_id" --}}>Categoria:</label>
                                        <select class="form-select" aria-label="Default select example" name="categoria_id" required>
                                            <option selected>Seleccionar</option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}" required>{{ $categoria->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- input para titulo --}}

                                    <div {{-- class="form-group" --}}>
                                        <label {{-- for="nombre" --}}>Título:</label>
                                        <input type="text" class="form-control {{-- {{ $errors->has('nombre') ? 'is-invalid' : '' }} --}}"
                                            {{-- id="nombre" --}} name="titulo" placeholder="" required
                                            value="{{ old('titulo') }}">
                                        {{-- @if ($errors->has('nombre'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('nombre') }}
                                            </div>
                                        @endif --}}
                                    </div>

                                    {{-- input para precio --}}
                                    <div>
                                        <label for="">Precio</label>
                                        <input type="text"class="form-control" name="precio"
                                            id=""value="{{ old('precio') }}" required>
                                    </div>
                                    {{-- input para moneda --}}
                                    <div>
                                        <label>Moneda:</label>
                                        <select class="form-select" name="moneda_id" required>
                                            <option selected>Seleccionar</option>
                                            @foreach ($monedas as $moneda)
                                                <option value="{{ $moneda->id }}">{{ $moneda->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- input para descripcion --}}
                                    <br>
                                    <div>
                                        <label for="">Descripción</label>
                                        {{-- <input type="textarea" class="form-control" name="descripcion"
                                            id=""value="{{ old('precio') }}">> --}}

                                        <textarea name="descripcion" class="form-control" id="" cols="" rows="5"required>{{ old('descripcion') }}</textarea>
                                    </div>

                                    {{-- input para condicion --}}
                                    <div>
                                        <label>Condición:</label>
                                        <select class="form-select" name="condicion_id">
                                            <option selected>Seleccionar</option>
                                            @foreach ($condiciones as $condicion)
                                                <option value="{{ $condicion->id }}">{{ $condicion->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- input para imagen --}}
                                    <div class="mb-3">
                                        <label {{-- for="formFile" --}} class="form-label">Carga una imagen a tu
                                            anuncio:</label>
                                        <input class="form-control" type="file" {{-- id="formFile" --}}>
                                    </div>
                                    {{-- input para descripcion --}}


                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Crear anuncio</button>
                                    <a href="{{ route('anuncios.index') }}" class="btn btn-default">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- ------------------------------inicio formulario------------------------------------ --}}
                <form class="forms-sample" action="{{ route('anuncios.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Categoria</label>
                        <input type="text" class="form-control" id="categoria" name="categoria"
                            value="{{ old('categoria') }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name') }}">
                    </div>




                    @error('name')
                        <br>
                        <span>*{{ $message }}</span>
                        <br>
                    @enderror
                    <br>

                    <label for="">
                        Slug:
                        <br>
                        <input type="text" name="slug" id="" value="{{ old('slug') }}">
                    </label>

                    @error('slug')
                        <br>
                        <span>*{{ $message }}</span>
                        <br>
                    @enderror
                    <br>
                    <label for="">
                        Descripción:
                        <br>
                        <textarea name="descripcion" id="" cols="30" rows="10">{{ old('descripcion') }}</textarea>
                    </label>

                    @error('descripcion')
                        <br>
                        <span>*{{ $message }}</span>
                        <br>
                    @enderror

                    <br>
                    <label for="">
                        Categoria:
                        <br>
                        <input type="text" name="categoria" id="" value="{{ old('categoria') }}">
                    </label>
                    <br>

                    @error('categoria')
                        <span>*{{ $message }}</span>
                        <br>
                    @enderror

                    <button type="submit">Enviar formulario</button>



                </form>
                {{-- ------------------------------------------------------------------ --}}
            </div>
        </div>
    </div>
@stop
