<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    @yield('css')

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


</head>
<body>

<header>
    @if(\App\Http\Controllers\Authentication::isHappen())
        @include('header_auth')
    @else
        @include('header')
    @endif
</header>

<main>
    @yield('content')
</main>

<footer>

</footer>

@yield('js')

<script src=" {{ asset('js/jquery.js') }} "></script>

</body>
</html>
