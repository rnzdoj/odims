<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/monk/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/monk/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/monk/css/untitled.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
</head>
<body id="page-top">
    <div id="wrapper">
        @include('monk.components.sidebar')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('componets.topbar')
            <div class="container-fluid">
                @yield('content')
                @include('componets.footer')
            </div>
        </div>
    </div>

    <a class="border rounded d-inline scroll-to-top" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('assets/monk/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/monk/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/monk/js/theme.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    
</body>
</html>
