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
</head>

<body class="template-color-1 nft-body-connect">
    <!-- start header area -->
    <!-- Start Header -->
    <header class="rn-header haeder-default header--sticky">
        <div class="container">
            <div class="header-inner">
                <div class="header-left">
                    <div class="logo-thumbnail logo-custom-css">
                        <a class="logo-light" href="/"><img
                                src="{{ asset('assets/images/logo/logo-white.png') }}" alt="nft-logo"></a>
                        <a class="logo-dark" href="/"><img src="{{ asset('assets/images/logo/logo-dark.png') }}"
                                alt="nft-logo"></a>
                    </div>
                </div>
                <div class="header-right">
                    @guest
                        <div class="setting-option">
                            <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesión</a>
                        </div>
                    @endguest
                    <div class="setting-option d-none d-lg-block">
                        <form class="search-form-wrapper" action="#">
                            <input type="search" placeholder="Search Here" aria-label="Search">
                            <div class="search-icon">
                                <button><i class="feather-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="setting-option rn-icon-list d-block d-lg-none">
                        <div class="icon-box search-mobile-icon">
                            <button><i class="feather-search"></i></button>
                        </div>
                        <form id="header-search-1" action="#" method="GET" class="large-mobile-blog-search">
                            <div class="rn-search-mobile form-group">
                                <button type="submit" class="search-button"><i class="feather-search"></i></button>
                                <input type="text" placeholder="Search ...">
                            </div>
                        </form>
                    </div>
                    @auth
                        <div class="setting-option rn-icon-list notification-badge" id="header_admin">
                            <div class="setting-option rn-icon-list user-account">
                                <div class="icon-box">
                                    <a href="#"><img src="{{ asset('assets/images/icons/boy-avater.png') }}"
                                            alt="Images"></a>
                                    <div class="rn-dropdown">
                                        <div class="rn-inner-top">
                                            <h4 class="title"><a href="product-details.html">Nombre de usuario</a></h4>
                                            <span><a href="#">Nombre</a></span>
                                        </div>
                                        <ul class="list-inner">
                                            <li><a href="home">Panel Admin</a></li>
                                            <li><a href="author.html">Mi perfil</a></li>
                                            <li><a href="edit-profile.html">Editar perfil</a></li>
                                            <li><a href="connect.html">Mis publicaciones</a></li>
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
                    <div class="setting-option mobile-menu-bar d-block d-xl-none">
                        <div class="hamberger">
                            <button class="hamberger-button">
                                <i class="feather-menu"></i>
                            </button>
                        </div>
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
                </div>
            </div>
        </div>
    </header>

    <!-- End Header Area -->
    <div class="popup-mobile-menu">
        <div class="inner">
            <div class="header-top">
                <div class="logo logo-custom-css">
                    <a class="logo-light" href="/"><img
                            src="{{ asset('assets/images/logo/logo-white.png') }}" alt="nft-logo"></a>
                    <a class="logo-dark" href="/"><img src="{{ asset('assets/images/logo/logo-dark.png') }}"
                            alt="nft-logo"></a>
                </div>
                <div class="close-menu">
                    <button class="close-button">
                        <i class="feather-x"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- ENd Header Area -->

    <!-- start banner area -->
    <div class="slider-one rn-section-gapTop">
        <div class="container">
            <div class="row row-reverce-sm align-items-center">
                <div class="col-lg-5 col-md-6 col-sm-12 mt_sm--50">
                    <h2 class="title" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">Bienvenido
                        al Marketplace</h2>
                    <p class="slide-disc" data-sal-delay="300" data-sal="slide-up" data-sal-duration="800">Descubre
                        nuevos productos</p>
                    <div class="button-group">
                        @guest


                            <a class="btn btn-large btn-primary" href="login" data-sal-delay="400" data-sal="slide-up"
                                data-sal-duration="800">Iniciar sesion</a>
                        @endguest
                        <a class="btn btn-large btn-primary-alta" href="create.html" data-sal-delay="500"
                            data-sal="slide-up" data-sal-duration="800">Crear</a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 offset-lg-1">
                    <div class="slider-thumbnail">
                        <img src="{{ asset('assets/images/slider/slider-1.png') }}" alt="Slider Images">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End banner area -->



    <!-- Explore Style Carousel End-->

    <!-- End service area -->
    <!-- New items Start -->
    <div class="rn-new-items rn-section-gapTop">
        <div class="container">
            <div class="row mb--50 align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        Categorías</h3>
                </div>
            </div>
            <div class="row g-5">
                @foreach($categorias as $categoria)
                    <!-- start single product -->
                    <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800"
                         class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-style-one no-overlay">
                            <div class="card-thumbnail">
                                <a href="product-details.html"><img
                                        src="{{ asset('assets/images/portfolio/portfolio-01.jpg') }}"
                                        alt="NFT_portfolio"></a>
                            </div>
                            <div class="product-share-wrapper">
                                <div class="profile-share">
                                    <a href="author.html" class="avatar" data-tooltip="Jone lee"><img
                                            src="{{ asset('assets/images/client/client-1.png') }}" alt="Nft_Profile"></a>
                                    <a href="author.html" class="avatar" data-tooltip="Jone Due"><img
                                            src="{{ asset('assets/images/client/client-2.png') }}" alt="Nft_Profile"></a>
                                    <a href="author.html" class="avatar" data-tooltip="Nisat Tara"><img
                                            src="{{ asset('assets/images/client/client-3.png') }}" alt="Nft_Profile"></a>
                                    <a class="more-author-text" href="#">9+ Place Bit.</a>
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
                                        <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal"
                                                data-bs-target="#shareModal">
                                            Share
                                        </button>
                                        <button type="button" class="btn-setting-text report-text"
                                                data-bs-toggle="modal" data-bs-target="#reportModal">
                                            Report
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <a href="product-details.html"><span class="product-name">{{ $categoria->nombre }}</span></a>
                            <span class="latest-bid">{{ $categoria->descripcion }}</span>
                            <div class="bid-react-area">
                                <div class="last-bid">Precio: {{ $categoria->precio }}</div>
                                <div class="react-area">
                                    <svg viewBox="0 0 17 16" fill="none" width="16" height="16"
                                        class="sc-bdnxRM sc-hKFxyN kBvkOu">
                                        <path
                                            d="M8.2112 14L12.1056 9.69231L14.1853 7.39185C15.2497 6.21455 15.3683 4.46116 14.4723 3.15121V3.15121C13.3207 1.46757 10.9637 1.15351 9.41139 2.47685L8.2112 3.5L6.95566 2.42966C5.40738 1.10976 3.06841 1.3603 1.83482 2.97819V2.97819C0.777858 4.36443 0.885104 6.31329 2.08779 7.57518L8.2112 14Z"
                                            stroke="currentColor" stroke-width="2"></path>
                                    </svg>
                                    <!-- <span class="number">322</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single product -->
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- New items End -->
    <!-- top top-seller start -->

    <!-- Start product area -->
    <div class="rn-product-area rn-section-gapTop">
        <div class="container">
            <div class="row mb--50 align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        Explorar Productos</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                    <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up"
                        data-sal-duration="800">
                        <button class="discover-filter-button discover-filter-activation btn btn-primary">Filter<i
                                class="feather-filter"></i></button>
                    </div>
                </div>
            </div>
            <div class="default-exp-wrapper default-exp-expand">
                <div class="inner">

                    <div class="filter-select-option">
                        <label class="filter-leble">Category</label>
                        <select>
                            <option data-display="Category">Category</option>
                            <option value="1">Categoria 1</option>
                            <option value="1">Categoria 2</option>
                            <option value="2">Categoria 3</option>

                        </select>
                    </div>
                    <div class="filter-select-option">
                        <label class="filter-leble">Price Range</label>
                        <div class="price_filter s-filter clear">
                            <form action="#" method="GET">
                                <div id="slider-range"></div>
                                <div class="slider__range--output">
                                    <div class="price__output--wrap">
                                        <div class="price--output">
                                            <span>Price :</span><input type="text" id="amount" readonly>
                                        </div>
                                        <div class="price--filter">
                                            <a class="btn btn-primary btn-small" href="#">Filter</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5">
                <!-- start single product -->
                <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800"
                    class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-style-one no-overlay">
                        <div class="card-thumbnail">
                            <a href="product-details.html"><img
                                    src="{{ asset('assets/images/portfolio/portfolio-01.jpg') }}"
                                    alt="NFT_portfolio"></a>
                        </div>
                        <div class="product-share-wrapper">
                            <div class="profile-share">
                                <a href="author.html" class="avatar" data-tooltip="Jone lee"><img
                                        src="{{ asset('assets/images/client/client-1.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Jone lee"><img
                                        src="{{ asset('assets/images/client/client-2.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Jone lee"><img
                                        src="{{ asset('assets/images/client/client-3.png') }}" alt="Nft_Profile"></a>
                                <a class="more-author-text" href="#">9+ Place Bit.</a>
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
                                    <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal"
                                        data-bs-target="#shareModal">
                                        Share
                                    </button>
                                    <button type="button" class="btn-setting-text report-text"
                                        data-bs-toggle="modal" data-bs-target="#reportModal">
                                        Report
                                    </button>
                                </div>

                            </div>
                        </div>
                        <a href="product-details.html"><span class="product-name">Preatent</span></a>
                        <span class="latest-bid">Highest bid 1/20</span>
                        <div class="bid-react-area">
                            <div class="last-bid">0.244wETH</div>
                            <div class="react-area">
                                <svg viewBox="0 0 17 16" fill="none" width="16" height="16"
                                    class="sc-bdnxRM sc-hKFxyN kBvkOu">
                                    <path
                                        d="M8.2112 14L12.1056 9.69231L14.1853 7.39185C15.2497 6.21455 15.3683 4.46116 14.4723 3.15121V3.15121C13.3207 1.46757 10.9637 1.15351 9.41139 2.47685L8.2112 3.5L6.95566 2.42966C5.40738 1.10976 3.06841 1.3603 1.83482 2.97819V2.97819C0.777858 4.36443 0.885104 6.31329 2.08779 7.57518L8.2112 14Z"
                                        stroke="currentColor" stroke-width="2"></path>
                                </svg>
                                <span class="number">322</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single product -->
                <!-- start single product -->
                <div data-sal="slide-up" data-sal-delay="200" data-sal-duration="800"
                    class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-style-one no-overlay">
                        <div class="card-thumbnail">
                            <a href="product-details.html"><img
                                    src="{{ asset('assets/images/portfolio/portfolio-02.jpg') }}"
                                    alt="NFT_portfolio"></a>
                        </div>
                        <div class="product-share-wrapper">
                            <div class="profile-share">
                                <a href="author.html" class="avatar" data-tooltip="mr. Davei"><img
                                        src="{{ asset('assets/images/client/client-4.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Mrs.Laumi"><img
                                        src="{{ asset('assets/images/client/client-5.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Shanon"><img
                                        src="{{ asset('assets/images/client/client-6.png') }}" alt="Nft_Profile"></a>
                                <a class="more-author-text" href="#">11+ Place Bit.</a>
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
                                    <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal"
                                        data-bs-target="#shareModal">
                                        Share
                                    </button>
                                    <button type="button" class="btn-setting-text report-text"
                                        data-bs-toggle="modal" data-bs-target="#reportModal">
                                        Report
                                    </button>
                                </div>

                            </div>
                        </div>
                        <a href="product-details.html"><span class="product-name">Diamond Dog</span></a>
                        <span class="latest-bid">Highest bid 5/11</span>
                        <div class="bid-react-area">
                            <div class="last-bid">0.892wETH</div>
                            <div class="react-area">
                                <svg viewBox="0 0 17 16" fill="none" width="16" height="16"
                                    class="sc-bdnxRM sc-hKFxyN kBvkOu">
                                    <path
                                        d="M8.2112 14L12.1056 9.69231L14.1853 7.39185C15.2497 6.21455 15.3683 4.46116 14.4723 3.15121V3.15121C13.3207 1.46757 10.9637 1.15351 9.41139 2.47685L8.2112 3.5L6.95566 2.42966C5.40738 1.10976 3.06841 1.3603 1.83482 2.97819V2.97819C0.777858 4.36443 0.885104 6.31329 2.08779 7.57518L8.2112 14Z"
                                        stroke="currentColor" stroke-width="2"></path>
                                </svg>
                                <span class="number">420</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single product -->
                <!-- start single product -->
                <div data-sal="slide-up" data-sal-delay="250" data-sal-duration="800"
                    class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-style-one no-overlay">
                        <div class="card-thumbnail">
                            <a href="product-details.html"><img
                                    src="{{ asset('assets/images/portfolio/portfolio-03.jpg') }}"
                                    alt="NFT_portfolio"></a>
                        </div>
                        <div class="product-share-wrapper">
                            <div class="profile-share">
                                <a href="author.html" class="avatar" data-tooltip="mr. Jone"><img
                                        src="{{ asset('assets/images/client/client-7.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Laumi"><img
                                        src="{{ asset('assets/images/client/client-8.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Tom"><img
                                        src="{{ asset('assets/images/client/client-9.png') }}" alt="Nft_Profile"></a>
                                <a class="more-author-text" href="#">12+ Place Bit.</a>
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
                                    <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal"
                                        data-bs-target="#shareModal">
                                        Share
                                    </button>
                                    <button type="button" class="btn-setting-text report-text"
                                        data-bs-toggle="modal" data-bs-target="#reportModal">
                                        Report
                                    </button>
                                </div>

                            </div>
                        </div>
                        <a href="product-details.html"><span class="product-name">OrBid6</span></a>
                        <span class="latest-bid">Highest bid 2/31</span>
                        <div class="bid-react-area">
                            <div class="last-bid">0.2128wETH</div>
                            <div class="react-area">
                                <svg viewBox="0 0 17 16" fill="none" width="16" height="16"
                                    class="sc-bdnxRM sc-hKFxyN kBvkOu">
                                    <path
                                        d="M8.2112 14L12.1056 9.69231L14.1853 7.39185C15.2497 6.21455 15.3683 4.46116 14.4723 3.15121V3.15121C13.3207 1.46757 10.9637 1.15351 9.41139 2.47685L8.2112 3.5L6.95566 2.42966C5.40738 1.10976 3.06841 1.3603 1.83482 2.97819V2.97819C0.777858 4.36443 0.885104 6.31329 2.08779 7.57518L8.2112 14Z"
                                        stroke="currentColor" stroke-width="2"></path>
                                </svg>
                                <span class="number">12</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single product -->
                <!-- start single product -->
                <div data-sal="slide-up" data-sal-delay="300" data-sal-duration="800"
                    class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-style-one no-overlay">
                        <div class="card-thumbnail">
                            <a href="product-details.html"><img
                                    src="{{ asset('assets/images/portfolio/portfolio-04.jpg') }}"
                                    alt="NFT_portfolio"></a>
                            <div class="countdown" data-date="2022-11-09">
                                <div class="countdown-container days">
                                    <span class="countdown-value">87</span>
                                    <span class="countdown-heading">D's</span>
                                </div>
                                <div class="countdown-container hours">
                                    <span class="countdown-value">23</span>
                                    <span class="countdown-heading">H's</span>
                                </div>
                                <div class="countdown-container minutes">
                                    <span class="countdown-value">38</span>
                                    <span class="countdown-heading">Min's</span>
                                </div>
                                <div class="countdown-container seconds">
                                    <span class="countdown-value">27</span>
                                    <span class="countdown-heading">Sec</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-share-wrapper">
                            <div class="profile-share">
                                <a href="author.html" class="avatar" data-tooltip="mr. Davei"><img
                                        src="{{ asset('assets/images/client/client-9.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Mrs.Laumi"><img
                                        src="{{ asset('assets/images/client/client-10.png') }}"
                                        alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Shanon"><img
                                        src="{{ asset('assets/images/client/client-11.png') }}"
                                        alt="Nft_Profile"></a>
                                <a class="more-author-text" href="#">13+ Place Bit.</a>
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
                                    <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal"
                                        data-bs-target="#shareModal">
                                        Share
                                    </button>
                                    <button type="button" class="btn-setting-text report-text"
                                        data-bs-toggle="modal" data-bs-target="#reportModal">
                                        Report
                                    </button>
                                </div>

                            </div>
                        </div>
                        <a href="product-details.html"><span class="product-name">Morgan11</span></a>
                        <span class="latest-bid">Highest bid 3/16</span>
                        <div class="bid-react-area">
                            <div class="last-bid">0.265wETH</div>
                            <div class="react-area">
                                <svg viewBox="0 0 17 16" fill="none" width="16" height="16"
                                    class="sc-bdnxRM sc-hKFxyN kBvkOu">
                                    <path
                                        d="M8.2112 14L12.1056 9.69231L14.1853 7.39185C15.2497 6.21455 15.3683 4.46116 14.4723 3.15121V3.15121C13.3207 1.46757 10.9637 1.15351 9.41139 2.47685L8.2112 3.5L6.95566 2.42966C5.40738 1.10976 3.06841 1.3603 1.83482 2.97819V2.97819C0.777858 4.36443 0.885104 6.31329 2.08779 7.57518L8.2112 14Z"
                                        stroke="currentColor" stroke-width="2"></path>
                                </svg>
                                <span class="number">20</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single product -->
                <!-- start single product -->
                <div data-sal="slide-up" data-sal-delay="350" data-sal-duration="800"
                    class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-style-one no-overlay">
                        <div class="card-thumbnail">
                            <a href="product-details.html"><img
                                    src="{{ asset('assets/images/portfolio/portfolio-05.jpg') }}"
                                    alt="NFT_portfolio"></a>
                        </div>
                        <div class="product-share-wrapper">
                            <div class="profile-share">
                                <a href="author.html" class="avatar" data-tooltip="Terasa"><img
                                        src="{{ asset('assets/images/client/client-8.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Sakib"><img
                                        src="{{ asset('assets/images/client/client-7.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Miraj"><img
                                        src="{{ asset('assets/images/client/client-3.png') }}" alt="Nft_Profile"></a>
                                <a class="more-author-text" href="#">15+ Place Bit.</a>
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
                                    <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal"
                                        data-bs-target="#shareModal">
                                        Share
                                    </button>
                                    <button type="button" class="btn-setting-text report-text"
                                        data-bs-toggle="modal" data-bs-target="#reportModal">
                                        Report
                                    </button>
                                </div>

                            </div>
                        </div>
                        <a href="product-details.html"><span class="product-name">mAtal8</span></a>
                        <span class="latest-bid">Highest bid 6/50</span>
                        <div class="bid-react-area">
                            <div class="last-bid">0.244wETH</div>
                            <div class="react-area">
                                <svg viewBox="0 0 17 16" fill="none" width="16" height="16"
                                    class="sc-bdnxRM sc-hKFxyN kBvkOu">
                                    <path
                                        d="M8.2112 14L12.1056 9.69231L14.1853 7.39185C15.2497 6.21455 15.3683 4.46116 14.4723 3.15121V3.15121C13.3207 1.46757 10.9637 1.15351 9.41139 2.47685L8.2112 3.5L6.95566 2.42966C5.40738 1.10976 3.06841 1.3603 1.83482 2.97819V2.97819C0.777858 4.36443 0.885104 6.31329 2.08779 7.57518L8.2112 14Z"
                                        stroke="currentColor" stroke-width="2"></path>
                                </svg>
                                <span class="number">205</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single product -->

                <!-- start single product -->
                <div data-sal="slide-up" data-sal-delay="400" data-sal-duration="800"
                    class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-style-one no-overlay">
                        <div class="card-thumbnail">
                            <a href="product-details.html"><img
                                    src="{{ asset('assets/images/portfolio/portfolio-06.jpg') }}"
                                    alt="NFT_portfolio"></a>

                        </div>
                        <div class="product-share-wrapper">
                            <div class="profile-share">
                                <a href="author.html" class="avatar" data-tooltip="Moris"><img
                                        src="{{ asset('assets/images/client/client-8.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Jsufia"><img
                                        src="{{ asset('assets/images/client/client-1.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Mordan"><img
                                        src="{{ asset('assets/images/client/client-2.png') }}" alt="Nft_Profile"></a>
                                <a class="more-author-text" href="#">9+ Place Bit.</a>
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
                                    <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal"
                                        data-bs-target="#shareModal">
                                        Share
                                    </button>
                                    <button type="button" class="btn-setting-text report-text"
                                        data-bs-toggle="modal" data-bs-target="#reportModal">
                                        Report
                                    </button>
                                </div>

                            </div>
                        </div>
                        <a href="product-details.html"><span class="product-name">Platonum</span></a>
                        <span class="latest-bid">Highest bid 1/10</span>
                        <div class="bid-react-area">
                            <div class="last-bid">0.450wETH</div>
                            <div class="react-area">
                                <svg viewBox="0 0 17 16" fill="none" width="16" height="16"
                                    class="sc-bdnxRM sc-hKFxyN kBvkOu">
                                    <path
                                        d="M8.2112 14L12.1056 9.69231L14.1853 7.39185C15.2497 6.21455 15.3683 4.46116 14.4723 3.15121V3.15121C13.3207 1.46757 10.9637 1.15351 9.41139 2.47685L8.2112 3.5L6.95566 2.42966C5.40738 1.10976 3.06841 1.3603 1.83482 2.97819V2.97819C0.777858 4.36443 0.885104 6.31329 2.08779 7.57518L8.2112 14Z"
                                        stroke="currentColor" stroke-width="2"></path>
                                </svg>
                                <span class="number">65</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single product -->
                <!-- start single product -->
                <div data-sal="slide-up" data-sal-delay="450" data-sal-duration="800"
                    class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-style-one no-overlay">
                        <div class="card-thumbnail">
                            <a href="product-details.html"><img
                                    src="{{ asset('assets/images/portfolio/portfolio-07.jpg') }}"
                                    alt="NFT_portfolio"></a>
                            <div class="countdown" data-date="2022-12-09">
                                <div class="countdown-container days">
                                    <span class="countdown-value">35</span>
                                    <span class="countdown-heading">D's</span>
                                </div>
                                <div class="countdown-container hours">
                                    <span class="countdown-value">42</span>
                                    <span class="countdown-heading">H's</span>
                                </div>
                                <div class="countdown-container minutes">
                                    <span class="countdown-value">10</span>
                                    <span class="countdown-heading">Min's</span>
                                </div>
                                <div class="countdown-container seconds">
                                    <span class="countdown-value">23</span>
                                    <span class="countdown-heading">Sec</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-share-wrapper">
                            <div class="profile-share">
                                <a href="author.html" class="avatar" data-tooltip="Thinm"><img
                                        src="{{ asset('assets/images/client/client-6.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Jubin"><img
                                        src="{{ asset('assets/images/client/client-10.png') }}"
                                        alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Nautial"><img
                                        src="{{ asset('assets/images/client/client-1.png') }}" alt="Nft_Profile"></a>
                                <a class="more-author-text" href="#">14+ Place Bit.</a>
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
                                    <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal"
                                        data-bs-target="#shareModal">
                                        Share
                                    </button>
                                    <button type="button" class="btn-setting-text report-text"
                                        data-bs-toggle="modal" data-bs-target="#reportModal">
                                        Report
                                    </button>
                                </div>

                            </div>
                        </div>
                        <a href="product-details.html"><span class="product-name">PlatOrgan</span></a>
                        <span class="latest-bid">Highest bid 2/22</span>
                        <div class="bid-react-area">
                            <div class="last-bid">0.311wETH</div>
                            <div class="react-area">
                                <svg viewBox="0 0 17 16" fill="none" width="16" height="16"
                                    class="sc-bdnxRM sc-hKFxyN kBvkOu">
                                    <path
                                        d="M8.2112 14L12.1056 9.69231L14.1853 7.39185C15.2497 6.21455 15.3683 4.46116 14.4723 3.15121V3.15121C13.3207 1.46757 10.9637 1.15351 9.41139 2.47685L8.2112 3.5L6.95566 2.42966C5.40738 1.10976 3.06841 1.3603 1.83482 2.97819V2.97819C0.777858 4.36443 0.885104 6.31329 2.08779 7.57518L8.2112 14Z"
                                        stroke="currentColor" stroke-width="2"></path>
                                </svg>
                                <span class="number">56</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single product -->
                <!-- start single product -->
                <div data-sal="slide-up" data-sal-delay="500" data-sal-duration="800"
                    class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-style-one no-overlay">
                        <div class="card-thumbnail">
                            <a href="product-details.html"><img
                                    src="{{ asset('assets/images/portfolio/portfolio-10.jpg') }}"
                                    alt="NFT_portfolio"></a>
                        </div>
                        <div class="product-share-wrapper">
                            <div class="profile-share">
                                <a href="author.html" class="avatar" data-tooltip="Tabriz"><img
                                        src="{{ asset('assets/images/client/client-6.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Juskin"><img
                                        src="{{ asset('assets/images/client/client-8.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Money"><img
                                        src="{{ asset('assets/images/client/client-9.png') }}" alt="Nft_Profile"></a>
                                <a class="more-author-text" href="#">14+ Place Bit.</a>
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
                                    <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal"
                                        data-bs-target="#shareModal">
                                        Share
                                    </button>
                                    <button type="button" class="btn-setting-text report-text"
                                        data-bs-toggle="modal" data-bs-target="#reportModal">
                                        Report
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a href="product-details.html"><span class="product-name">Orgajis</span></a>
                        <span class="latest-bid">Highest bid 2/10</span>
                        <div class="bid-react-area">
                            <div class="last-bid">0.244wETH</div>
                            <div class="react-area">
                                <svg viewBox="0 0 17 16" fill="none" width="16" height="16"
                                    class="sc-bdnxRM sc-hKFxyN kBvkOu">
                                    <path
                                        d="M8.2112 14L12.1056 9.69231L14.1853 7.39185C15.2497 6.21455 15.3683 4.46116 14.4723 3.15121V3.15121C13.3207 1.46757 10.9637 1.15351 9.41139 2.47685L8.2112 3.5L6.95566 2.42966C5.40738 1.10976 3.06841 1.3603 1.83482 2.97819V2.97819C0.777858 4.36443 0.885104 6.31329 2.08779 7.57518L8.2112 14Z"
                                        stroke="currentColor" stroke-width="2"></path>
                                </svg>
                                <span class="number">89</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single product -->
                <!-- start single product -->
                <div data-sal="slide-up" data-sal-delay="550" data-sal-duration="800"
                    class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-style-one no-overlay">
                        <div class="card-thumbnail">
                            <a href="product-details.html"><img
                                    src="{{ asset('assets/images/portfolio/portfolio-09.jpg') }}"
                                    alt="NFT_portfolio"></a>
                        </div>
                        <div class="product-share-wrapper">
                            <div class="profile-share">
                                <a href="author.html" class="avatar" data-tooltip="Morokko"><img
                                        src="{{ asset('assets/images/client/client-6.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Levnon"><img
                                        src="{{ asset('assets/images/client/client-1.png') }}" alt="Nft_Profile"></a>
                                <a href="author.html" class="avatar" data-tooltip="Trim sawdi"><img
                                        src="{{ asset('assets/images/client/client-10.png') }}"
                                        alt="Nft_Profile"></a>
                                <a class="more-author-text" href="#">12+ Place Bit.</a>
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
                                    <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal"
                                        data-bs-target="#shareModal">
                                        Share
                                    </button>
                                    <button type="button" class="btn-setting-text report-text"
                                        data-bs-toggle="modal" data-bs-target="#reportModal">
                                        Report
                                    </button>
                                </div>

                            </div>
                        </div>
                        <a href="product-details.html"><span class="product-name">#720</span></a>
                        <span class="latest-bid">Highest bid 1/1</span>
                        <div class="bid-react-area">
                            <div class="last-bid">0.244wETH</div>
                            <div class="react-area">
                                <svg viewBox="0 0 17 16" fill="none" width="16" height="16"
                                    class="sc-bdnxRM sc-hKFxyN kBvkOu">
                                    <path
                                        d="M8.2112 14L12.1056 9.69231L14.1853 7.39185C15.2497 6.21455 15.3683 4.46116 14.4723 3.15121V3.15121C13.3207 1.46757 10.9637 1.15351 9.41139 2.47685L8.2112 3.5L6.95566 2.42966C5.40738 1.10976 3.06841 1.3603 1.83482 2.97819V2.97819C0.777858 4.36443 0.885104 6.31329 2.08779 7.57518L8.2112 14Z"
                                        stroke="currentColor" stroke-width="2"></path>
                                </svg>
                                <span class="number">502</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end product area -->
    <!-- collection area Start -->
    < <!-- End single collention -->

        </div>
        </div>
        <!-- collection area End -->
        <!-- Modal -->
        <div class="rn-popup-modal share-modal-wrapper modal fade" id="shareModal" tabindex="-1"
            aria-hidden="true">
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
                            <li><a href="#"><span class="icon"><i
                                            data-feather="instagram"></i></span><span
                                        class="text">instagram</span></a></li>
                            <li><a href="#"><span class="icon"><i data-feather="youtube"></i></span><span
                                        class="text">youtube</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="rn-popup-modal report-modal-wrapper modal fade" id="reportModal" tabindex="-1"
            aria-hidden="true">
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
        <!-- End Top To Bottom Area  -->
        <!-- JS ============================================ -->
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

        <script></script>
</body>

</html>
