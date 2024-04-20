@include('layouts.header', ['title' => "{{ __('auth.login') }}" ])

<div class="login-box">
    @if ($errors->has('loginError'))
        <div class="alert alert-danger">
            {{ $errors->first('loginError') }}
        </div>
    @endif
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ __('auth.login') }}</p>

            <form action="{{ route('login.admin') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input class="form-control" type="text" name="email" class="form-control" placeholder="{{ __('auth.email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" class="form-control" placeholder="{{ __('auth.password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="row">

                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('auth.loginbtn') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@section('scripts')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
@endsection
