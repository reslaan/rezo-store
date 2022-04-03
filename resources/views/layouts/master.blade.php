<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ app()->getLocale() == 'ar' ? asset('js/app-ar.js') : asset('js/app.js') }}" defer></script>--}}
    <script src="{{  asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{ app()->getLocale() == 'ar' ? asset('css/app-ar.css') : asset('css/app.css')}}" rel="stylesheet">
</head>
<body>

{{-- Add top bar --}}
{{--@include('comman.top-bar')--}}
{{-- Add nav bar --}}


{{-- Add content --}}
<main >
    @yield('content')
</main>
{{-- Add footer --}}
{{--@include('comman.footer')--}}
{{--@include('sweetalert::alert')--}}
</body>
</html>
