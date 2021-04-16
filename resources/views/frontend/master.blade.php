<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('frontend_assets/images/favicon.png') }}" rel="icon"/>
    <title>Payyed - @yield('title')</title>

    @include('frontend.layouts.styles')

    @stack('css')
</head>
<body>

<!-- Preloader -->
<div id="preloader">
    <div data-loader="dual-ring"></div>
</div>
<!-- Preloader End -->

<div id="main-wrapper">

    @include('frontend.layouts.header')

    <div id="content">

        @yield('content')

    </div>

    @include('frontend.layouts.footer')

</div>

<!-- Back to Top
============================================= -->
<a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i class="fa fa-chevron-up"></i></a>

@include('frontend.layouts.scripts')

@stack('scripts')
</body>
</html>
