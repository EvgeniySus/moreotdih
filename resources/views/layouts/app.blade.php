<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $view->discription }}">
    <meta name="keywords" content="{{ $view->keywords }}">

    {{-- Og --}}
    <meta property="og:site_name" content="moreotdih.ru">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:type" content="">

    <meta property="og:title" content="{{ $view->metatitle }}">
    <meta property="og:description" content="{{ $view->discription }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary">
    <meta property="twitter:url" content="">
    <meta name="twitter:image" content="">

    <meta name="twitter:title" content="{{ $view->metatitle }}">
    <meta name="twitter:description" content="{{ $view->discription }}">



    <title> {{ $view->metatitle }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="{{$view->page_modifay}}">
<div class="wrapper" id="app">
    <header class="block-header">
        <logo></logo>
        <topmenu></topmenu>
        <topcontact></topcontact>
    </header>


        @yield('content')
    <aside class="block-right"></aside>

<footer class="block-footer">

    <div class="block-footer-corp">&copy; MoreOtdih.RU Данные, используемые на сайте MoreOtdih.RU, включая стоимость туристского продукта, а также расписание самолетов, поездов, электропоездов и автобусов взяты из официальных источников. Туристский продукт, электронные авиа- и ж/д билеты, электронные билеты на автобусы предоставляются партнерами MoreOtdih.RU и их стоимость указана с учетом сервисного сбора MoreOtdih.RU. Окончательную сумму можно получить на шаге подтверждения заказа. При использовании материалов ссылка на сайт MoreOtdih.RU обязательна. <a href="#">Политика MoreOtdih.RU в отношении обработки персональных данных.</a> 2022г.</div>
    <div class="block-footer-menu">
        <ul>
            <li><a href="#">Правовая информация</a> </li>
            <li><a href="#">О компании </a> </li>
            <li><a href="#">Реклама на MoreOtdih.RU</a> </li>
            <li><a href="#">Контакты</a> </li>
            <li><a href="#">Обратная связь</a></li>
        </ul>
    </div>

</footer>

</div>
    <script src="{{ asset('js/index.js') }}" defer></script>
</body>
</html>
