<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Marketplace</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="theme-style-mode" content="1"> <!-- 0 == light, 1 == dark -->

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
    <!-- CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/feature.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/odometer.css') }}">

    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        /* para etiquetas */
        .etiqueta {
            /*  display: inline-block;
            background-color: #f0f0f0;
            color: #333;
            padding: 5px 10px;
            border-radius: 3px;
            margin-right: 5px; */
            display: inline-block;
            background-color: #f0f0f0;
            color: #333;
            padding: 3px 8px;
            /* Ajustar el padding para reducir el tamaño */
            border-radius: 3px;
            margin: 2px 2px;
            /* Agregar margen de 2px arriba y abajo, y 2px a los lados */
        }

        /* para etiquetas */

        .discount-badge {
            position: absolute;
            bottom: 5px;
            /* Ajusta la distancia desde abajo */
            left: 5px;
            /* Ajusta la distancia desde la izquierda */
            background-color: yellow;
            color: black;
            padding: 5px;
            border-radius: 5px;
        }

        .card-thumbnail {
            margin-bottom: 20px;
            /* Espacio entre cada tarjeta */
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 200px;
            /* Ajusta la altura deseada */
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

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
        }

        .product-share-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .profile-share {
            flex: 1;
        }

        .share-btn {
            flex: 1;
        }

        .product-name {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        .latest-bid {
            display: block;
            color: gray;
        }

        .bid-react-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .last-bid {
            flex: 1;
        }

        .react-area {
            flex: 1;
            display: flex;
            align-items: center;
        }

        .react-area svg {
            margin-right: 5px;
        }
    </style>

</head>

<body class="template-color-1 nft-body-connect">
    <!-- start header area -->
    <!-- Start Header -->
    <header class="rn-header haeder-default header--sticky">
        <div class="container">
            <div class="header-inner">
                <div class="header-left">
                    <div class="logo-thumbnail logo-custom-css">
                        <a class="logo-light" href="/"><img src="{{ asset('assets/images/logo/logo-white.png') }}"
                                alt="nft-logo"></a>
                        <a class="logo-dark" href="/"><img src="{{ asset('assets/images/logo/logo-dark.png') }}"
                                alt="nft-logo"></a>
                    </div>
                </div>
                <div class="header-right">
                    @guest

                        <div class="setting-option">
                            <a href="{{ route('register') }}" class="btn btn-primary">Registrarse</a>
                        </div>
                        <div class="setting-option">
                            <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesión</a>
                        </div>


                    @endguest
                    <div class="setting-option d-none d-lg-block">
                        <form class="search-form-wrapper" action="{{ route('filtro.search') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="search_query" class="form-control" placeholder="Buscar"
                                    aria-label="Search" aria-describedby="button-search">
                                <button class="btn btn-primary" type="submit" id="button-search"><i
                                        class="feather-search"></i></button>
                            </div>
                        </form>
                    </div>

                    <div class="setting-option rn-icon-list d-block d-lg-none">
                        <form action="{{ route('filtro.search') }}" method="POST">
                            @csrf
                            <div class="filter-select-option">
                                <label class="filter-label">Buscar</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="search_query" class="form-control"
                                        placeholder="Buscar..." aria-label="Buscar"
                                        aria-describedby="button-search-mobile">
                                    <button class="btn btn-primary" type="submit" id="button-search-mobile"><i
                                            class="feather-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>




                    <div id="my_switcher" class="my_switcher setting-option">
                        <ul>
                            <li>
                                <a href="javascript: void(0);" data-theme="light" class="setColor light">
                                    <img class="sun-image" src="{{ asset('assets/images/icons/sun-01.svg') }}"
                                        alt="Sun images">
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                                    <img class="Victor Image" src="{{ asset('assets/images/icons/vector.svg') }}"
                                        alt="Vector Images">
                                </a>
                            </li>
                        </ul>
                    </div>

                    @auth
                        <div class="setting-option rn-icon-list notification-badge" id="header_admin">
                            <div class="setting-option rn-icon-list user-account">
                                <div class="icon-box">
                                    <a href="#"><img src="{{ asset('assets/images/icons/boy-avater.png') }}"
                                            alt="Images"></a>
                                    <div class="rn-dropdown">
                                        <div class="rn-inner-top">
                                            <h4 class="title"><a
                                                    href="product-details.html">{{ auth()->user()->name }}</a></h4>
                                            <span><a href="#">{{ auth()->user()->rol }}</a></span>
                                        </div>
                                        <ul class="list-inner">
                                            @auth
                                                @if (auth()->user()->hasRole('administrador'))
                                                    <li><a href="home">Panel admin</a></li>
                                                @else
                                                    <li><a href="anuncios">Mis publicaciones</a></li>
                                                @endif
                                            @endauth


                                            <li><a href="profiles">Mi perfil</a></li>
                                            <li><a href="{{ route('planes') }}">Membresías </a></li>
                                            <li><a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                                                    sesión</a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </header>




    <div class="container">
        <div class="row mb--50 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    Publicaciones</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up"
                    data-sal-duration="800">
                    <button class="discover-filter-button discover-filter-activation btn btn-primary">Filtro<i
                            class="feather-filter"></i></button>
                </div>
            </div>
        </div>
        <div class="default-exp-wrapper default-exp-expand">
            <div class="inner">
                <form action="{{ route('FiltroHomePage') }}" method="POST">
                    @csrf
                    <div class="filter-select-option">
                        <label class="filter-leble">Category</label>
                        <select name="categoria">
                            <option data-display="Category">Category</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-select-option">
                        <label class="filter-leble">Rango de Precio</label>
                        <div class="price_filter s-filter clear" id="filtroid">
                            <div class="slider__range--output">
                                <div class="price__output--wrap">
                                    <div class="price--output">
                                        <span>Precio Mínimo:</span>
                                        <input type="text" id="precio_min" name="precio_min">
                                    </div>
                                    <div class="price--output">
                                        <span>Precio Máximo:</span>
                                        <input type="text" id="precio_max" name="precio_max">
                                    </div>
                                    <div class="price--filter">
                                        <button type="submit" class="btn btn-primary btn-small">Filtrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row g-5">
            <!-- start single product -->
            @foreach ($anuncios as $anuncio)
                @if ($anuncio->habilitado === 1)
                    <div data-sal="slide-up" data-sal-delay="550" data-sal-duration="800"
                        class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-style-one no-overlay">

                            <div class="card-thumbnail">
                                <a href="{{ route('detalle', ['id' => $anuncio->id]) }}">

                                    <div class="image-container">
                                        <img src="
                    @php
if ($anuncio->imagen !== null && isset($anuncio->imagen->url)) {
                        echo Storage::url($anuncio->imagen->url);
                    } @endphp
                "
                                            alt="NFT_portfolio">
                                        @if ($anuncio->disponible === 0)
                                            <div class="sold-overlay">Vendido</div>
                                        @endif

                                        @if ($anuncio->descuento > 0)
                                            <div class="discount-badge">{{ $anuncio->descuento }}% de descuento
                                                hasta
                                                @foreach ($anuncioServicios2 as $unAnuncioServicio2)
                                                    @if ($anuncio->id === $unAnuncioServicio2->anuncio_id)
                                                        {{ $unAnuncioServicio2->fecha_fin }}
                                                    @endif
                                                @endforeach

                                            </div>
                                        @endif
                                    </div>

                                </a>
                            </div>


                            <div class="product-share-wrapper">
                                <div class="profile-share">
                                    <a class="avatar" data-tooltip="{{ $anuncio->usuario->name }}">
                                        <img src="{{ $anuncio->usuario->adminlte_image() }}" alt="Nft_Profile">
                                    </a>

                                </div>

                                <div class="share-btn share-btn-activation dropdown">
                                    <button class="icon" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg viewBox="0 0 14 4" fill="none" width="16" height="16"
                                            class="sc-bdnxRM sc-hKFxyN hOiKLt">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.5 2C3.5 2.82843 2.82843 3.5 2 3.5C1.17157 3.5 0.5 2.82843 0.5 2C0.5 1.17157 1.17157 0.5 2 0.5C2.82843 0.5 3.5 1.17157 3.5 2ZM8.5 2C8.5 2.82843 7.82843 3.5 7 3.5C6.17157 3.5 5.5 2.82843 5.5 2C5.5 1.17157 6.17157 0.5 7 0.5C7.82843 0.5 8.5 1.17157 8.5 2ZM11.999 3.5C12.8274 3.5 13.499 2.82843 13.499 2C13.499 1.17157 12.8274 0.5 11.999 0.5C11.1706 0.5 10.499 1.17157 10.499 2C10.499 2.82843 11.1706 3.5 11.999 3.5Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </button>


                                    <div class="share-btn-setting dropdown-menu dropdown-menu-end">
                                        <button type="button" class="btn-setting-text share-text"
                                            data-bs-toggle="modal" data-bs-target="#shareModal">
                                            Compartir
                                        </button>
                                        <button type="button" class="btn-setting-text report-text"
                                            data-bs-toggle="modal" data-bs-target="#reportModal">
                                            Guardar
                                        </button>
                                    </div>

                                </div>


                            </div>

                            <a href="{{ route('detalle', ['id' => $anuncio->id]) }}">
                                <span class="product-name">{{ $anuncio->titulo }}</span>
                            </a>

                            <div>
                                @foreach ($anuncio->etiquetas as $etiqueta)
                                    <span class="etiqueta"> {{ $etiqueta->name }}</span>
                                @endforeach
                            </div>
                            <span class="latest-bid">{{-- {{ $anuncio->estado->nombre }} --}}</span>
                            <div class="bid-react-area">
                                <div class="last-bid">{{ $anuncio->precio }} {{ $anuncio->moneda->nombre }}</div>
                                <div class="react-area">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="1 0 20 20" width="16"
                                        height="16" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="sc-bdnxRM sc-hKFxyN kBvkOu" style="margin-right: 5px;">
                                        <path
                                            d="M15.5 12c0-1.93-2.5-3.5-5.5-3.5S4.5 10.07 4.5 12s2.5 3.5 5.5 3.5 5.5-1.57 5.5-3.5zm-7 0a1.499 1.499 0 1 1 2.999-.001A1.499 1.499 0 0 1 8.5 12z" />
                                        <path d="M22 12s-4-6-10-6S2 12 2 12s4 6 10 6 10-6 10-6z" />
                                    </svg>
                                    <span class="number">{{ $anuncio->visitas }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach



        </div>
    </div>





    </div>
    </div>
    </div>
    <div class="rn-popup-modal share-modal-wrapper modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                data-feather="x"></i></button>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content share-wrapper">
                <div class="modal-header share-area">
                    <h5 class="modal-title">Share this NFT</h5>
                </div>
                <div class="modal-body">
                    <ul class="social-share-default">
                        <li><a href="#"><span class="icon"><i data-feather="facebook"></i></span><span
                                    class="text">facebook</span></a></li>
                        <li><a href="#"><span class="icon"><i data-feather="twitter"></i></span><span
                                    class="text">twitter</span></a></li>
                        <li><a href="#"><span class="icon"><i data-feather="linkedin"></i></span><span
                                    class="text">linkedin</span></a></li>
                        <li><a href="#"><span class="icon"><i data-feather="instagram"></i></span><span
                                    class="text">instagram</span></a></li>
                        <li><a href="#"><span class="icon"><i data-feather="youtube"></i></span><span
                                    class="text">youtube</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="rn-popup-modal report-modal-wrapper modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                data-feather="x"></i></button>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content report-content-wrapper">
                <div class="modal-header report-modal-header">
                    <h5 class="modal-title">Why are you reporting?
                    </h5>
                </div>
                <div class="modal-body">
                    <p>Describe why you think this item should be removed from marketplace</p>
                    <div class="report-form-box">
                        <h6 class="title">Message</h6>
                        <textarea name="message" placeholder="Write issues"></textarea>
                        <div class="report-button">
                            <button type="button" class="btn btn-primary mr--10 w-auto">Report</button>
                            <button type="button" class="btn btn-primary-alta w-auto"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!-- Start Top To Bottom Area  -->
    <div class="rn-progress-parent">
        <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    @include('layouts.footer')
    <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/modernizer.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/sal.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/particles.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.style.swicher.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/count-down.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/isotop.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/imageloaded.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/backtoTop.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/odometer.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-appear.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/scrolltrigger.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.custom-file-input.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/savePopup.js') }}"></script>

    <!-- main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Meta Mask  -->
    <script src="{{ asset('assets/js/vendor/web3.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/maralis.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/nft.js') }}"></script>



</body>

</html>
