@extends('layouts.homepage_layout')
@section('styles')
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
@endsection
@section('js')
@endsection
