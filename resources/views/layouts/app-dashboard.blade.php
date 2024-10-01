<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cure All - CDHI Web based') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animsition.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') }}">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/img/icon1.jpg') }}" type="image/x-icon">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
    @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');

    #wrapper {
        padding-left: 0;
        -webkit-transition: all .5s ease;
        -moz-transition: all .5s ease;
        -o-transition: all .5s ease;
        transition: all .5s ease;
    }

    @media (min-width: 992px) {
        #wrapper {
            padding-left: 225px;
        }
    }

    @media (min-width: 992px) {
        #wrapper #sidebar-wrapper {
            width: 225px;
        }
    }

    #sidebar-wrapper {
        border-right: 1px solid #e7e7e7;
    }

    #sidebar-wrapper {
        z-index: 1000;
        position: fixed;
        left: 225px;
        width: 0;
        height: 100%;
        margin-left: -225px;
        overflow-y: auto;
        background: #f8f8f8;
        -webkit-transition: all .5s ease;
        -moz-transition: all .5s ease;
        -o-transition: all .5s ease;
        transition: all .5s ease;
    }

    #sidebar-wrapper .sidebar-nav {
        position: absolute;
        top: 0;
        width: 225px;
        font-size: 14px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    #sidebar-wrapper .sidebar-nav li {
        font-size: 1.9rem;
        text-indent: 0;
        line-height: 45px;
    }

    #sidebar-wrapper .sidebar-nav li a {
        font-size: 1.9rem;
        display: block;
        text-decoration: none;
        color: #428bca;
        padding: 6%;

    }

    .sidebar-nav li:first-child a {
        background: #92bce0 !important;
        color: #fff !important;
    }

    #sidebar-wrapper .sidebar-nav li a .sidebar-icon {
        width: 45px;
        height: 45px;
        font-size: 1.9rem;
        padding: 7px;
        display: inline-block;
        text-indent: 7px;
        margin-right: 10px;
        color: #fff;
        float: left;
    }

    #sidebar-wrapper .sidebar-nav li a .caret {
        position: absolute;
        right: 23px;
        top: auto;
        margin-top: 20px;
    }

    #sidebar-wrapper .sidebar-nav li ul.panel-collapse {
        list-style: none;
        -moz-padding-start: 0;
        -webkit-padding-start: 0;
        -khtml-padding-start: 0;
        -o-padding-start: 0;
        padding-start: 0;
        padding: 0;
    }

    #sidebar-wrapper .sidebar-nav li ul.panel-collapse li i {
        margin-right: 10px;
    }

    #sidebar-wrapper .sidebar-nav li ul.panel-collapse li {
        text-indent: 15px;
    }

    @media (max-width: 992px) {
        #wrapper #sidebar-wrapper {
            width: 13%;
        }

        #wrapper #sidebar-wrapper #sidebar #sidemenu li ul {
            position: fixed;
            left: 45px;
            margin-top: -45px;
            z-index: 1000;
            width: 200px;
            height: 0;
        }
    }

    .sidebar-nav li:first-child a {
        background: #92bce0 !important;
        color: #fff !important;
    }

    .sidebar-nav li:nth-child(2) a {
        background: #6aa3d5 !important;
        color: #fff !important;
    }

    .sidebar-nav li:nth-child(3) a {
        background: #428bca !important;
        color: #fff !important;
    }

    .sidebar-nav li:nth-child(4) a {
        background: #3071a9 !important;
        color: #fff !important;
    }

    .sidebar-nav li:nth-child(5) a {
        background: #245682 !important;
        color: #fff !important;
    }
</style>

<body>
    @include('layouts.partials.dashboard-nav')
    <div id="app" class="d-flex">
        <nav>
            @yield('sidebar') <!-- Section for the sidebar -->
        </nav>

        <div class="main-content p-4">
            @yield('content') <!-- Section for the main content -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
