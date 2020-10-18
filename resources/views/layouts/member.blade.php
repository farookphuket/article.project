<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel='icon' href='{{asset("favicon.ico")}}' type='image/x-icon'/ >
    <title>
        @yield("meta_title")
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <!-- test -->
    <link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js"></script>
<!-- and it's easy to individually load additional languages -->
<script charset="UTF-8"
 src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/languages/go.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/highlightjs-line-numbers.js@2.8.0/dist/highlightjs-line-numbers.min.js"></script>

    <script>

        hljs.initHighlightingOnLoad();

        hljs.initLineNumbersOnLoad();
    </script>

    <!-- Start prism -->

    <link href="{{asset("prism/prism-funky.css")}}" rel="stylesheet">
    <script type="text/javascript" src="{{asset("prism/prism.js")}}"></script>

    <!-- End prism -->

    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom_theme.css') }}" rel="stylesheet">
    @include("INC/jodit")
    @yield("tag_in_head")
</head>
<body>
    @include("layouts.member_menu")

    <div id="app">

    </div>
    <div class="container pt-2">
        @include("INC.flash_message")
        @yield('content')
    </div>
    
</body>
</html>
