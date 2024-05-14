
@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1 class="m-0 text-dark">Editar anuncio</h1>
@stop

@section('js')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        //cambiar imagen
        document.getElementById("formFile").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
            console.log("file");
        }
    </script>
@stop

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <strong>¡Revise los campos!</strong>
                        @foreach ($errors->all() as $error)
                            <span class="badge badge-danger">{{ $error }}</span>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {{-- ------------------------------inicio formulario------------------------------------ --}}
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary">

                            <form method="POST" action="{{ route('anuncios.update', $anuncio->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">

                                    {{-- input para seleccionar categoria --}}


                                    <label>Categoria:</label>
                                    <select class="form-select" name="categoria_id" id="">
                                        <option selected>Seleccionar</option>
                                        @foreach ($categorias as $categoria)
                                            <optgroup
                                                label="
                                                {{ $categoria->nombre }}
                                                    ">
                                                @foreach ($subcategorias as $subcategoria)
                                                    @if ($subcategoria->padre_id === $categoria->id)
                                                        @if ($subcategoria->id === $anuncio->categoria->id)
                                                            <option value="{{ $subcategoria->id }} "selected>
                                                                {{ $subcategoria->nombre }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $subcategoria->id }}">
                                                                {{ $subcategoria->nombre }}
                                                            </option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>

                                    @foreach ($monedas as $moneda)
                                        @if ($moneda->id === $anuncio->moneda->id)
                                            <option value="{{ $moneda->id }}" selected>{{ $moneda->nombre }}
                                            </option>
                                        @else
                                            <option value="{{ $moneda->id }}">{{ $moneda->nombre }}</option>
                                        @endif
                                    @endforeach

                                    {{-- input para titulo --}}
                                    <div {{-- class="form-group" --}}>
                                        <label {{-- for="nombre" --}}>Título:</label>
                                        <input type="text" class="form-control {{-- {{ $errors->has('nombre') ? 'is-invalid' : '' }} --}}"
                                            {{-- id="nombre" --}} name="titulo" placeholder="" required
                                            value="{{ old('titulo', $anuncio->titulo) }}">
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
                                            id=""value="{{ old('precio', $anuncio->precio) }}" required>
                                    </div>

                                    {{-- input para moneda --}}
                                    <div>
                                        <label>Moneda:</label>
                                        <select class="form-select" name="moneda_id" required>
                                            <option selected>Seleccionar</option>
                                            @foreach ($monedas as $moneda)
                                                @if ($moneda->id === $anuncio->moneda->id)
                                                    <option value="{{ $moneda->id }}" selected>{{ $moneda->nombre }}
                                                    </option>
                                                @else
                                                    <option value="{{ $moneda->id }}">{{ $moneda->nombre }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- input para descripcion --}}
                                    <br>
                                    <div>
                                        <label for="">Descripción</label>
                                        {{-- <input type="textarea" class="form-control" name="descripcion"
                                            id=""value="{{ old('precio') }}">> --}}

                                        <textarea name="descripcion" class="form-control" id="" cols="" rows="5"required>{{ old('descripcion', $anuncio->descripcion) }}</textarea>
                                    </div>

                                    {{-- input para condicion --}}
                                    <div>
                                        <label>Condición:</label>
                                        <select class="form-select" name="condicion_id">
                                            <option selected value="">Seleccionar
                                            </option>
                                            @foreach ($condiciones as $condicion)
                                                @if ($condicion->id === $anuncio->condicion->id)
                                                    <option value="{{ $condicion->id }}" selected>{{ $condicion->nombre }}
                                                    </option>
                                                @else
                                                    <option value="{{ $condicion->id }}">{{ $condicion->nombre }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- input para imagen --}}
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Carga una imagen a tu anuncio:</label>
                                        <input class="form-control" type="file" id="formFile" name="formFile"
                                            {{-- accept="image/*" --}}>
                                    </div>

                                    <div class="image-wrapper">
                                        <img src="@php
if(($anuncio->imagen !== null) && isset($anuncio->imagen->url)){
                                        echo Storage::url($anuncio->imagen->url); 
                                      }else { 
                                        echo "https://wpdirecto.com/wp-content/uploads/2017/08/alt-de-una-imagen.png";
                                      } @endphp"
                                            class="rounded mx-auto d-block" alt="" id="picture">
                                    </div>
                                </div>
                                {{-- botones --}}
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a class="btn btn-default" href="{{ route('anuncios.index') }}">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop
