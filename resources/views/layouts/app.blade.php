<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="wrapper index_page" id="app">
    <header class="block-header">
        <logo></logo>
        <topmenu></topmenu>
        <topcontact></topcontact>
    </header>
    <main class="block-main">
        <div class="block-search-form"></div>
        @yield('content')

    </main>
    <aside class="block-right"></aside>

<footer class="block-footer"></footer>

</div>
    <script src="{{ asset('js/index.js') }}" defer></script>
</body>
</html>
