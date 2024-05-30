@extends('adminlte::page')
@include('components.helpButton')
@section('title', 'Crear')

@section('content_header')
    <h1 class="m-0 text-dark">Mejorar anuncio</h1>
@stop
@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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


        .text-body-secondary {
            background-color: orange;
        }
    </style>
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
                {{-- ------------------------------inicio formulario------------------------------------ --}}
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            {{-- <div class="card-header">
                                <h3 class="card-title">Nueva Categoría</h3>
                            </div> --}}
                            <form action="{{ route('contenido_promocional.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    {{-- ---------------------------------------------------------------------------------------------- --}}
                                    <div class="container">


                                        <div class="row">
                                            <div class="col">
                                                <div class="card">
                                                    <div class="card-header">

                                                        <h5>Tu anuncio con etiquetas</h5>

                                                    </div>
                                                    <div class="card-body">

                                                        <p>Para captar la atención de posibles compradores, selecciona los
                                                            iconos a
                                                            continuación.
                                                        </p>
                                                        <p>Bs. 10 por etiqueta. Cada uno tiene una duración de 30 dias.</p>
                                                        {{-- primera opcion --}}
                                                        {{-- @foreach ($etiquetas as $etiqueta)
                                                    <div class="col">
                                                        <input type="checkbox" name="etiquetas[]" id=""
                                                            value="{{ $etiqueta->id }}">
                                                        <span
                                                            class="badge text-bg-primary rounded-pill">{{ $etiqueta->name }}</span>
                                                    </div>
                                                @endforeach --}}


                                                        {{-- segunda opcion --}} {{-- puedo personalizar cada etiqueta(color, estilo, etc) --}}
                                                        <input type="checkbox" name="etiquetas[]" id=""
                                                            value="{{ $etiquetas[0]->id }}">
                                                        <span class="badge text-bg-secondary rounded-pill">Negociable</span>

                                                        <input type="checkbox" name="etiquetas[]" id=""
                                                            value="{{ $etiquetas[1]->id }}">
                                                        <span class="badge text-bg-secondary rounded-pill">En oferta</span>

                                                        <input type="checkbox" name="etiquetas[]" id=""
                                                            value="{{ $etiquetas[2]->id }}">
                                                        <span class="badge text-bg-success rounded-pill">Nuevo</span>

                                                        <input type="checkbox" name="etiquetas[]" id=""
                                                            value="{{ $etiquetas[3]->id }}">
                                                        <span class="badge text-bg-danger rounded-pill">Promoción</span>

                                                        <input type="checkbox" name="etiquetas[]" id=""
                                                            value="{{ $etiquetas[4]->id }}">
                                                        <span class="badge text-bg-warning rounded-pill">De ocación</span>

                                                        <input type="checkbox" name="etiquetas[]" id=""
                                                            value="{{ $etiquetas[5]->id }}">
                                                        <span class="badge text-bg-info rounded-pill">Remato</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{--  flex-direction:col  o row --}}
                                        {{-- inicio row --}}

                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Destaca tu Anuncio y recibe más llamadas</h5>
                                            </div>

                                            <div class="card-body">
                                                <p>Llama la atención de los compradores y vende más rapido con nuestros
                                                    destaques.
                                                </p>
                                                <p>
                                                    <strong>
                                                        {{-- Escoge una oferta a continuación --}}(4 semanas igual a 30 dias):
                                                    </strong>
                                                </p>
                                                <div class="row">

                                                    {{-- fila 1 columna 1 --}}
                                                    <div class="col">
                                                        <div class="card">

                                                            <div class="card-header">
                                                                <h5>POSICIONAMIENTO</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $servicios[0]->titulo }}</h5>
                                                                <p class="card-text">
                                                                    {{ $servicios[0]->descripcion }}
                                                                </p>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-danger dropdown-toggle"
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        Bs.
                                                                        {{ $servicios[0]->precio }}.00
                                                                    </button>


                                                                    <ul class="dropdown-menu ">
                                                                        <li>
                                                                            <p for="opcion" class="">Ingrese el
                                                                                número de semanas: <br></p>
                                                                            <input type="text" name="oferta1"
                                                                                id="opcion" placeholder="0">
                                                                            <h6 class="dropdown-header">Semanas</h6>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                1 semana
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                2 semanas
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                3 semanas
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                4 semanas
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <hr class="dropdown-divider" />
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                Fecha actual: <br>
                                                                                {{ $fecha_actual }}
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                            </div>



                                                        </div>
                                                    </div>
                                                    {{-- fila 1 columna 2 --}}
                                                    <div class="col">
                                                        <div class="card">

                                                            <div class="card-header">
                                                                <h5>DESCUENTO</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $servicios[1]->titulo }}</h5>
                                                                <p class="card-text">
                                                                    {{ $servicios[1]->descripcion }}
                                                                </p>

                                                                <input type="text" value="" name="descuento"
                                                                    class="form-control" placeholder="0.0%">
                                                                <br>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-danger dropdown-toggle"
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        Bs.
                                                                        {{ $servicios[1]->precio }}.00
                                                                    </button>


                                                                    <ul class="dropdown-menu ">
                                                                        <li>
                                                                            <p for="opcion" class="">Ingrese el
                                                                                número de semanas: <br></p>
                                                                            <input type="text" name="oferta2"
                                                                                id="opcion" placeholder="0">
                                                                            <h6 class="dropdown-header">Semanas</h6>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                1 semana
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                2 semanas
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                3 semanas
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                4 semanas
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <hr class="dropdown-divider" />
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                Fecha actual: <br>
                                                                                {{ $fecha_actual }}
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <div class="card-body">

                                                            </div>

                                                        </div>
                                                    </div>
                                                    {{-- fila 1 columna 3 --}}
                                                    {{-- <div class="col">
                                                        <div class="card">

                                                            <div class="card-header">
                                                                <h5>Oferta 3</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $servicios[2]->titulo }}</h5>
                                                                <p class="card-text">
                                                                    {{ $servicios[2]->descripcion }}
                                                                </p>

                                                                <div class="dropdown">
                                                                    <button class="btn btn-danger dropdown-toggle"
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        Bs.
                                                                        {{ $servicios[2]->precio }}.00
                                                                    </button>


                                                                    <ul class="dropdown-menu ">
                                                                        <li>
                                                                            <p for="opcion" class="">Ingrese el
                                                                                número de semanas: <br></p>
                                                                            <input type="text" name="oferta3"
                                                                                id="opcion" placeholder="0">
                                                                            <h6 class="dropdown-header">Semanas</h6>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                1 semana
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                2 semanas
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                3 semanas
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                4 semanas
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <hr class="dropdown-divider" />
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                Fecha actual: <br>
                                                                                {{ $fecha_actual }}
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div> --}}
                                                    {{-- fin row --}}


                                                    <div class="{{-- col --}}">
                                                        <div class="card">

                                                            <div class="image-wrapper">
                                                                <img src="@php
if(($anuncio->imagen !== null) && isset($anuncio->imagen->url)){
                                                                                echo Storage::url($anuncio->imagen->url);
                                                              }else { 
                                                              echo "https://wpdirecto.com/wp-content/uploads/2017/08/alt-de-una-imagen.png";
                                                            
                                                          } @endphp"
                                                                    alt="{{ $anuncio->titulo }}"
                                                                    class="rounded mx-auto d-block" alt=""
                                                                    id="picture">
                                                            </div>

                                                            <div class="card-body">
                                                                <h5 class="card-title"><strong>Título:</strong> <br>
                                                                    {{ $anuncio->titulo }}
                                                                </h5>


                                                                <p class="card-text">
                                                                    <strong> Descripción:</strong>
                                                                <div>
                                                                    {!! nl2br($anuncio->descripcion) !!}
                                                                </div>
                                                                {{-- {{ $anuncio->descripcion }} --}}
                                                                </p>

                                                                <a {{-- href="" --}}
                                                                    class="btn btn-warning">{{ $anuncio->moneda->nombre }}.
                                                                    {{ $anuncio->precio }}</a>
                                                                <a {{-- href="" --}} class="btn btn-warning">Visitas:
                                                                    {{ $anuncio->visitas }}</a>
                                                            </div>

                                                            <div
                                                                class="card-footer text-body-secondary"style="background-color: orange;">
                                                                Fecha publicación: {{ $anuncio->fecha_publicacion }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        {{-- ---------------------------------------------------------------------------------------------- --}}
                                        <div class="b-example-divider"></div>

                                        <div class="container">

                                        </div>
                                        <input type="text" name="id_anuncio"value="{{ $anuncio->id }}" hidden>

                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Ir a pagar</button>
                                        <a href="{{ route('anuncios.index') }}" class="btn btn-secondary">Cancelar</a>


                                    </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
