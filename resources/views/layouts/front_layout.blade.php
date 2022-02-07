<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('admin/img/apple-icon.png') }}" rel="stylesheet">
    <link href="{{ asset('admin/img/favicon.png') }}" rel="stylesheet">
    <style>
        a {
            text-decoration: none !important;
        }

    </style>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

    <!-- Sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    @include('frontend.includes.navbar')

    @if (request()->is('/'))
        @include('frontend.includes.slider')
    @endif

    <div class="container my-3">
        @yield('content')
    </div>

    <x-alert />
    <script src="{{ asset('frontend/js/jquery.js') }}" rel="stylesheet"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>

    @stack('scripts')

</body>

</html>


{{-- <script>
    $('document').ready(function() {
        alert('dd');
    })
</script> --}}
