<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {{-- @if ($title != null) --}}
        {{-- <title> {{ __('auth.login') }} </title> --}}
    {{-- @else --}}
        <title> @yield('title') </title>
    {{-- @endif --}}
    <!-- Font Awesome Icons -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"> --}}
    <!-- Theme style -->
    <!-- Tempusdominus Bbootstrap 4 -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"> --}}
    <!-- iCheck -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
    <!-- JQVMap -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}"> --}}
    <!-- overlayScrollbars -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}"> --}}
    <!-- Daterange picker -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}"> --}}
    <!-- summernote -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}"> --}}
    <!-- Theme style -->
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/dist/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('fonts/SansPro/SansPro.min.css') }}">
    @if (session()->has('locale') && session()->get('locale') == 'ar')
        <link rel="stylesheet" href="{{ asset('css/bootstrap_rtl-v4.2.1/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap_rtl-v4.2.1/custom_rtl.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('css/mycustomstyle.css') }}">
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
