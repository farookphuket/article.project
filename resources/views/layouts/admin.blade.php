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

    @include('INC.prism')
    @include('INC.hljs')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}"></script>

    @include("INC/jodit3")

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom_theme.css') }}" rel="stylesheet">
    @yield('tag_in_head')
</head>
<body>
    @include('layouts.admin_menu')
    <div class="pt-4">
        @include('INC.flash_message')
    </div>
    
    <div class="container">
        <div id="app">
        </div>
        
        @yield('content')
    </div>
    
</body>
</html>
