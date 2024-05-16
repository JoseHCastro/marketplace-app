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

                {{-- <div class="setting-option mobile-menu-bar d-block d-xl-none">
                    <div class="hamberger">
                        <button class="hamberger-button">
                            <i class="feather-menu"></i>
                        </button>
                    </div>
                </div> --}}

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
                                        <h4 class="title"><a href="product-details.html">{{ auth()->user()->name }}</a>
                                        </h4>
                                        <span><a href="#">{{ auth()->user()->rol }}</a></span>
                                    </div>
                                    <ul class="list-inner">

                                        @if (auth()->user()->id == '7')
                                            <li><a href="{{ route('home') }}">Panel admin</a></li>
                                        @else
                                            <li><a href="anuncios">Mis publicaciones</a></li>
                                        @endif

                                        <li><a href="{{ route('profiles.index') }}">Mi perfil</a></li>
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
