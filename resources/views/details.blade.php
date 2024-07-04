@extends('layouts.homepage_layout')
@section('styles')
    <style>
        .sold-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 0, 0, 0.7);
            color: white;
            padding: 40px 70px;
            border-radius: 5px;
            font-size: 40px;
            width: 90%; /* Asegura que la superposición ocupe todo el ancho de la imagen */
            text-align: center; /* Centra el texto horizontalmente */
        }

        .rn-pd-thumbnail {
            position: relative; /* Asegura que el contenedor de la imagen sea el punto de referencia para la superposición */
        }
    </style>
@endsection
@section('content')
    <!-- start page title area -->
    <div class="rn-breadcrumb-inner ptb--30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <h5 class="title text-center text-md-start">Detalles del anuncio</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-list">
                        <li class="item"><a href="/">Home</a></li>
                        <li class="separator"><i class="feather-chevron-right"></i></li>
                        <li class="item current">Detalles del anuncio</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title area -->

    <!-- start product details area -->
    <div class="product-details-area rn-section-gapTop">
        <div class="container">
            <div class="row g-5">
                <!-- product image area -->

                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="product-tab-wrapper rbt-sticky-top-adjust">
                        <div class="pd-tab-inner">
                            <div class="nav rn-pd-nav rn-pd-rt-content nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-home" type="button" role="tab"
                                    aria-controls="v-pills-home" aria-selected="true">
                                    <span class="rn-pd-sm-thumbnail">
                                        <img src="@php
if ($anuncio->imagen !== null && isset($anuncio->imagen->url)) {
                                                                echo Storage::url($anuncio->imagen->url);
                                                            } @endphp"
                                            alt="Nft_Profile1">
                                    </span>
                                </button>
                                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-profile" type="button" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="false">
                                </button>
                                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-messages" type="button" role="tab"
                                    aria-controls="v-pills-messages" aria-selected="false">
                                </button>
                            </div>

                            <div class="tab-content rn-pd-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <div class="rn-pd-thumbnail">
                                        <img src="@php
if ($anuncio->imagen !== null && isset($anuncio->imagen->url)) {
                                                                echo Storage::url($anuncio->imagen->url);
                                                            } @endphp"
                                            alt="Nft_Profile4">
                                            @if ($anuncio->disponible === 0)
                                            <div class="sold-overlay">Vendido</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- product image area end -->

                <div class="col-lg-5 col-md-12 col-sm-12 mt_md--50 mt_sm--60">
                    <div class="rn-pd-content-area">
                        <div class="pd-title-area">
                            <h4 class="title">{{ $anuncio->titulo }}</h4>
                            <div class="pd-react-area">
                                <div class="heart-count">
                                    <i data-feather="heart"></i>

                                </div>
                            </div>
                        </div>
                        <span class="bid">Precio: <span class="price">{{ $anuncio->precio }}
                                {{ $anuncio->moneda->nombre }}</span></span>
                        <h6 class="title-name">
                            {{ $anuncio->descripcion }}
                        </h6>
                        <div class="catagory-collection">
                            <div class="catagory">
                                <span>Categoria <span class="color-body">
                                        {{ $anuncio->categoria->nombre }}</span></span>

                            </div>
                            <div class="collection">
                                <span>Visitas <span class="color-body">
                                        {{ $anuncio->visitas }}</span></span>

                            </div>
                        </div>

                        <div class="rn-bid-details">
                            <div class="tab-wrapper-one">

                                <div class="tab-content rn-bid-content" id="nav-tabContent">
                                    <div class="tab-pane fade" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">

                                    </div>
                                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="rn-pd-bd-wrapper">
                                            <div class="top-seller-inner-one">
                                                <h6 class="name-title">
                                                    Vendedor(a):
                                                </h6>
                                                <div class="top-seller-wrapper">
                                                    <div class="thumbnail">
                                                        <a href="#"><img
                                                                src="{{ $anuncio->usuario->adminlte_image() }}"
                                                                alt="Nft_Profile"></a>
                                                    </div>
                                                    <div class="top-seller-content">
                                                        <a href="#">
                                                            <h6 class="name">{{ $anuncio->usuario->name }}</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                        aria-labelledby="nav-contact-tab">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End product details area -->


    <!-- COMENTARIOS -->

    <div class="comments-wrapper pt--40 centered-content">
        <div class="comments-area">
            <div class="trydo-blog-comment">
                <h5 class="comment-title mb--40">Comentarios:</h5>
                <!-- Start Coment List  -->
                <ul class="comment-list">
                    @foreach ($comentarios as $comentario)
                        <li class="comment parent">
                            <div class="single-comment">
                                <div class="comment-author comment-img">
                                    <img class="comment-avatar" src="{{ $comentario->usuario->adminlte_image() }} "
                                        style="width: 50px; height: 50px;" alt="Comment Image">
                                    <div class="m-b-20">
                                        <div class="commenter">{{ $comentario->usuario->name }}</div>
                                        <div class="time-spent"> {{ $comentario->fecha }}, a las {{ $comentario->hora }}
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-text">
                                    <p>{{ $comentario->contenido }}</p>
                                </div>
                                @auth
                                    @can('eliminar comentario')
                                        @if ($comentario->user_id == auth()->user()->id || auth()->user()->hasRole('administrador'))
                                            <div class="reply-edit">
                                                <div class="reply">
                                                    <form method="POST"
                                                        action="{{ route('comentarios.destroy', $comentario->id) }}"
                                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar este comentario?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            style="background: none; border: none; padding: 0; cursor: pointer; color: rgb(39, 83, 206);">
                                                            <i class="rbt feather-x"></i> Eliminar
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    @endcan
                                @endauth
                            </div>
                        </li>
                    @endforeach

                </ul>
                <!-- End Coment List  -->
            </div>
        </div>
    </div>

    <!-- Start Contact Form Area  -->
    <div class="rn-comment-form pt--60 centered-content">
        <div class="inner">
            <div class="section-title">
                <span class="subtitle">¿Tienes un comentario?</span>
                <h2 class="title">Deja una respuesta</h2>
            </div>
            <form id="comment-form" class="mt--40" method="POST"
                action="{{ auth()->check() ? route('comentarios.store') : route('login') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="rnform-group">
                            <textarea id="comment-content" name="contenido" placeholder="Comentario"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="anuncio_id" value="{{ $anuncio->id }}">
                    <div class="col-lg-12">
                        <div class="blog-btn">
                            @auth
                                @can('comentar')
                                    <button type="submit" id="submit-comment" class="btn btn-primary-alta btn-large w-50">
                                        <span>ENVIAR COMENTARIO</span>
                                    </button>
                                @endcan
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary-alta btn-large w-50">
                                    <span>Iniciar sesión para comentar</span>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Contact Form Area  -->
    <!-- FINAL COMENTARIOS -->
@endsection

@section('js')
@endsection
