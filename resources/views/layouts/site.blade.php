<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta name="description"
          content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description"
          content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Rezo Store</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <!-- Font-icon css-->
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    <!-- Main CSS-->

    <link rel="stylesheet" type="text/css" href="{{ app()->getLocale() == 'ar' ? asset('css/main-ar.css') : asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ app()->getLocale() == 'ar' ? asset('css/app-ar.css') : asset('css/app.css') }}">
    @stack('css')

</head>

<body class="app sidebar-mini">

<!-- fixed-top-->
@include('web.includes.header')
<!-- ////////////////////////////////////////////////////////////////////////////-->


@yield('content')
<!-- ////////////////////////////////////////////////////////////////////////////-->

@include('web.includes.footer')
<!-- Essential javascripts for application to work-->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{ asset('js/plugins/pace.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-notify.min.js') }}"></script>

<!-- Page specific javascripts-->
<script type="text/javascript" src="{{ asset('js/plugins/chart.js') }}"></script>

<script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>


@yield('script')
@yield('alert-script')
</body>

</html>
