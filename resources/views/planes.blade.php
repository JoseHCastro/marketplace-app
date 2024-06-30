@extends('layouts.homepage_layout')
@section('styles')
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        
        function enviarPedido(precio, membresia_id) {      

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('pago.form') }}";


            const token = document.createElement('input');
            token.type = 'hidden';
            token.name = '_token';
            token.value = "{{ csrf_token() }}";

            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'total_amount';
            input.value = precio;

            
            const membresia = document.createElement('input');
            membresia.type = 'hidden';
            membresia.name = 'membresia_id';
            membresia.value = membresia_id;

            form.appendChild(token); 
            form.appendChild(input);
            form.appendChild(membresia);
            document.body.appendChild(form);
            form.submit();
        }
      
    </script>
@stop


@section('content')
    <!-- start page title area -->
    <div class="rn-breadcrumb-inner ptb--30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <h5 class="title text-center text-md-start">Planes Membresía</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-list">
                        <li class="item"><a href="/">Home</a></li>
                        <li class="separator"><i class="feather-chevron-right"></i></li>
                        <li class="item current">Planes Membresía</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- start service area -->
    <div class="rn-service-area rn-section-gapTop">
        <div class="container">
            {{-- <div class="row">
                <div class="col-12 mb--50">
                    <h3 class="title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Create and sell your
                        NFTs</h3>
                </div>
            </div> --}}
            <div class="row g-5">
                @foreach ($membresias as $membresia)
                    <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800"
                            class="rn-service-one color-shape-7">
                            <div class="inner">
                                <div class="icon">
                                    <img src="assets/images/icons/shape-7.png" alt="Shape">
                                </div>
                                {{-- <div class="subtitle">Step-01</div> --}}
                                <div class="content">
                                    <h4 class="title"><a href="#">{{ $membresia->titulo }}</a></h4>
                                    <p class="description">Descripción: {{ $membresia->descripcion }}</p>
                                    <p class="description">Precio: {{ $membresia->precio }} </p>
                                    @if ($membresia->etiqueta)
                                        <p class="description">Etiquetas: Si</p>
                                    @else
                                        <p class="description">Etiquetas: No</p>
                                    @endif
                                    <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>

                          
                            <a class="over-link" type="button" onclick="enviarPedido({{ $membresia->precio }}, {{ $membresia->id }})"></a>
                        </div>
                    </div>
                @endforeach

                <div>

                </div>
            </div>
        </div>
    </div>
    <!-- End service area -->
@endsection
