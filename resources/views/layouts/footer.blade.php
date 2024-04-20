<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>

<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2024-<?php $mytime = Carbon\Carbon::now();echo $mytime->format('Y'); ?> <a href="{{ config('app.developer_link') }}">{{ config('app.developer_name') }}</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
{{-- @stack('scripts')   --}}
<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/dist/adminlte.min.js') }}"></script>
</body>

</html>
