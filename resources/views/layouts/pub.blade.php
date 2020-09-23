<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel='icon' href='{{asset("favicon.ico")}}' type='image/x-icon'/ >
    <title>
        @yield('meta_title')
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- hljs -->
    @include('INC/hljs')

    <!-- prism -->
    @include('INC/prism')



    <!-- Styles -->
    <link href="{{ asset('css/custom_theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('layouts.pub_menu')
    @include('INC/flash_message')
    <div class="container">
        <div id="app">
        </div>
        @yield('content')
    </div>
</body>
</html>
