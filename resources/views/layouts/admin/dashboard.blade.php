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
    <title> @yield('title') </title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/dist/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('fonts/SansPro/SansPro.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mycustomstyle.css') }}">
    <style type="text/css">
        .ck-editor__editable_inline
        {
            height: 300px;
        }
    </style>
    @if (session()->has('locale') && session()->get('locale') == 'ar')
        <link rel="stylesheet" href="{{ asset('css/bootstrap_rtl-v4.2.1/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap_rtl-v4.2.1/custom_rtl.css') }}">
    @endif

    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.admin.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @include('layouts.admin.content')

        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        @include('layouts.admin.footer')

    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/dist/adminlte.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
{{-- <script>
    var allEditors = document.querySelectorAll( '#editor' );
    for(var i = 0 ; i < allEditors.length ; i++){
        ClassicEditor
            .create(allEditors[i] , 
        {
            ckfinder:
            {
                uploadUrl: "{{ route('store-page' , ['_token' => csrf_token()]) }}",
            }
        })
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    // console.error( error );
            } );
    }

</script>  --}}
{{-- <script>
    ClassicEditor
        .create(document.querySelectorAll('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script> --}}
    @yield('js')
</body>

</html>
