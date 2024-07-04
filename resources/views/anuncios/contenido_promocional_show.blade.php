@extends('adminlte::page')
@include('components.helpButton')
@section('title', 'Crear')

@section('content_header')
    <h1 class="m-0 text-dark">Mejorar anuncio</h1>
@stop

@section('css')
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Cambiar imagen
        document.getElementById("formFile").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }

        // Calcular monto total y redirigir al formulario de pago
        function calcularMontoTotal(id_anuncio) {
            let totalAmount = 0;

            // Calcular el monto total basado en las opciones seleccionadas



            @if (!auth()->user()->membresia->etiqueta)
                document.querySelectorAll('input[name="etiquetas[]"]:checked').forEach(el => {
                    totalAmount += 10; // Precio por etiqueta
                });
            @endif


            const oferta1 = parseInt(document.querySelector('input[name="oferta1"]').value) || 0;
            if (oferta1 >= 1 && oferta1 <= 4) {
                totalAmount += 75; // Precio fijo para posicionamiento
            }

            const oferta2 = parseInt(document.querySelector('input[name="oferta2"]').value) || 0;
            if (oferta2 >= 1 && oferta2 <= 4) {
                totalAmount += 75; // Precio fijo para descuento
            }

            // Redirigir al formulario de pago con el monto total
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('pago.form') }}";

            const token = document.createElement('input');
            token.type = 'hidden';
            token.name = '_token';
            token.value = "{{ csrf_token() }}";

            const inputTotalAmount = document.createElement('input');
            inputTotalAmount.type = 'hidden';
            inputTotalAmount.name = 'total_amount';
            inputTotalAmount.value = totalAmount;

            const inputIdAnuncio = document.createElement('input');
            inputIdAnuncio.type = 'hidden';
            inputIdAnuncio.name = 'id_anuncio';
            inputIdAnuncio.value = id_anuncio;

            form.appendChild(token);
            form.appendChild(inputTotalAmount);
            form.appendChild(inputIdAnuncio);

            document.body.appendChild(form);
            form.submit();
        }

        // Validar el rango de semanas
        function validarSemanas(event) {
            const value = event.target.value;
            if (value < 1 || value > 4) {
                event.target.value = '';
                alert('Por favor, ingrese un número de semanas entre 1 y 4.');
            }
        }
        // Añadir validación a los campos de entrada de semanas
        document.querySelectorAll('input[name="oferta1"], input[name="oferta2"]').forEach(input => {
            input.addEventListener('input', validarSemanas);
        });
    </script>
@stop

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <form id="anuncio-form" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Tu anuncio con etiquetas</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <p>Para captar la atención de posibles compradores, selecciona los
                                                            iconos a continuación.</p>
                                                        <p>Bs. 10 por etiqueta. Cada uno tiene una duración de 30 días.</p>
                                                        <input type="checkbox" name="etiquetas[]"
                                                            value="{{ $etiquetas[0]->id }}">
                                                        <span class="badge text-bg-secondary rounded-pill">Negociable</span>
                                                        <input type="checkbox" name="etiquetas[]"
                                                            value="{{ $etiquetas[1]->id }}">
                                                        <span class="badge text-bg-secondary rounded-pill">En oferta</span>
                                                        <input type="checkbox" name="etiquetas[]"
                                                            value="{{ $etiquetas[2]->id }}">
                                                        <span class="badge text-bg-success rounded-pill">Nuevo</span>
                                                        <input type="checkbox" name="etiquetas[]"
                                                            value="{{ $etiquetas[3]->id }}">
                                                        <span class="badge text-bg-danger rounded-pill">Promoción</span>
                                                        <input type="checkbox" name="etiquetas[]"
                                                            value="{{ $etiquetas[4]->id }}">
                                                        <span class="badge text-bg-warning rounded-pill">De ocasión</span>
                                                        <input type="checkbox" name="etiquetas[]"
                                                            value="{{ $etiquetas[5]->id }}">
                                                        <span class="badge text-bg-info rounded-pill">Remato</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Destaca tu Anuncio y recibe más llamadas</h5>
                                            </div>
                                            <div class="card-body">
                                                <p>Llama la atención de los compradores y vende más rápido con nuestros
                                                    destaques.</p>
                                                <p><strong>(4 semanas igual a 30 días):</strong></p>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5>POSICIONAMIENTO</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $servicios[0]->titulo }}</h5>
                                                                <p class="card-text">{{ $servicios[0]->descripcion }}</p>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-danger dropdown-toggle"
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        Bs. {{ $servicios[0]->precio }}.00
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li>
                                                                            <p>Ingrese el número de semanas: <br></p>
                                                                            <input type="number" name="oferta1"
                                                                                id="opcion1" min="1" max="4"
                                                                                placeholder="0">
                                                                            <h6 class="dropdown-header">Semanas</h6>
                                                                        </li>
                                                                        <li>
                                                                            <hr class="dropdown-divider" />
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Fecha
                                                                                actual: {{ $fecha_actual }}</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5>DESCUENTO</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $servicios[1]->titulo }}</h5>
                                                                <p class="card-text">{{ $servicios[1]->descripcion }}</p>
                                                                <input type="text" value="" name="descuento"
                                                                    class="form-control" placeholder="0.0%">
                                                                <br>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-danger dropdown-toggle"
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        Bs. {{ $servicios[1]->precio }}.00
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li>
                                                                            <p>Ingrese el número de semanas: <br></p>
                                                                            <input type="number" name="oferta2"
                                                                                id="opcion2" min="1" max="4"
                                                                                placeholder="0">
                                                                            <h6 class="dropdown-header">Semanas</h6>
                                                                        </li>
                                                                        <li>
                                                                            <hr class="dropdown-divider" />
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Fecha
                                                                                actual: {{ $fecha_actual }}</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="image-wrapper">
                                                                <img src="{{ isset($anuncio->imagen->url) ? Storage::url($anuncio->imagen->url) : 'https://wpdirecto.com/wp-content/uploads/2017/08/alt-de-una-imagen.png' }}"
                                                                    alt="{{ $anuncio->titulo }}"
                                                                    class="rounded mx-auto d-block" id="picture">
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title">
                                                                    <strong>Título:</strong><br>{{ $anuncio->titulo }}
                                                                </h5>
                                                                <p class="card-text">
                                                                    <strong>Descripción:</strong>
                                                                <div>{!! nl2br($anuncio->descripcion) !!}</div>
                                                                </p>
                                                                <a class="btn btn-warning">{{ $anuncio->moneda->nombre }}.
                                                                    {{ $anuncio->precio }}</a>
                                                                <a class="btn btn-warning">Visitas:
                                                                    {{ $anuncio->visitas }}</a>
                                                            </div>
                                                            <div class="card-footer text-body-secondary"
                                                                style="background-color: orange;">
                                                                Fecha publicación: {{ $anuncio->fecha_publicacion }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" name="id_anuncio" value="{{ $anuncio->id }}" hidden>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-primary"
                                            onclick="calcularMontoTotal({{ $anuncio->id }})">Ir a pagar</button>
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
