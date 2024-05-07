<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-hover" data-theme-mode="light">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="whmcs website templates, whmcs html template, hosting template html, bootstrap whmcs, bootstrap web hosting template, web hosting template with whmcs, html hosting template,website hosting and templates, html web hosting, hosting website template, web hosting in html, template hosting bootstrap, whmcs hosting template, whmcs web hosting template">

    <!-- TITLE -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/brand/favicon.ico') }}" type="image/x-icon">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

    <!-- Simonwep-picker CSS -->
    <link href="{{ asset('assets/libs/@simonwep/pickr/themes/classic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/@simonwep/pickr/themes/monolith.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!-- Swiper CSS-->
    <link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}">

</head>

<body class="main-body light-theme">

    <!-- Back-to-top -->
    <a href="#top" id="back-to-top" class="back-to-top rounded-circle shadow all-ease-03 fade-in">
        <i class="fe fe-arrow-up"></i>
    </a>

    <!-- <a href="javascript:void(0);" class="buy-now" data-target="html">
        <span class="fe fe-message-square"></span>
    </a> -->

    <div class="page">

        @include('layouts.front.header')
        <!-- <a href="javascript:void(0);" class="buy-now" data-target="html">
        <span class="fe fe-message-square"></span>
    </a> -->

        @include('layouts.front.content')


        @include('layouts.front.footer')
    </div>
</body>

</html>
