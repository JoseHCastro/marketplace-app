<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head_homepage')
    @yield('styles')

</head>

<body class="template-color-1 nft-body-connect">
    <div class="mouse-cursor cursor-outer"></div>
        <div class="mouse-cursor cursor-inner"></div>
    @include('layouts.top_nav')
    @yield('content')


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
    @yield('js')
</body>

</html>
