<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/admin/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1"><b>Admin</b></a>
    </div>
    <div class="card-body">
      <!-- <p class="login-box-msg">Sign in to start your session</p> -->

      <form action="{{ asset('login') }}" method="post">
      @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="{{ __('Email Address') }}">
          @error('email')
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope">
                        {{ $message }}
                </span>
                </div>
            </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}">
          @error('password')
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"> {{ $message }} </span>
            </div>
          </div>
          @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                {{ __('Remember Me') }}
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/admin/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
