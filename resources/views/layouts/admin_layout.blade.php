<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('admin/img/apple-icon.png') }}" rel="stylesheet">
    <link href="{{ asset('admin/img/favicon.png') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Fonts -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- Admin -->
    <link href="{{ asset('admin/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('admin.includes.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('admin.includes.navbar')
        <div class="container-fluid py-4">
            @yield('content')
        </div>
    </main>



    <x-alert />
    <script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/chartjs.min.js') }}"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('admin/js/material-dashboard.min.js') }}"></script>

    @stack('scripts')

</body>

</html>
