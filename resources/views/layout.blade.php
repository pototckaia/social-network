<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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


<script type="text/javascript" src=" {{ asset('js/jquery.js') }} "></script>
<script type="text/javascript" src=" {{ asset('js/bootstrap.min.js') }} "></script>
@yield('js')

</body>
</html>
