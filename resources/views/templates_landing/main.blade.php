<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SEMERUSMART</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/mico-html/css/bootstrap.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap">
    <link rel="stylesheet"
        type="text/css"href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- font awesome style -->
    <link href="{{ asset('public/mico-html/css/font-awesome.min.css') }}" />
    <!-- nice select -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
    <!-- datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <!-- Custom styles for this template -->
    <link href="{{ asset('public/mico-html/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('public/mico-html/css/responsive.css') }}" rel="stylesheet" />

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('templates_landing.header')
        <!-- end header section -->
        <!-- slider section -->
        <div class="v_utama">
            @yield('container')
        </div>
        <!-- end slider section -->
    </div>

    @include('templates_landing.footer')
