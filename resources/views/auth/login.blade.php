@extends('layouts.app')

@section('content')

<div class="login-box">
  <div class="login-logo">
    <img src="/backend/img/admin.jpg" alt="" class="img-circle">
    <a href="/"><b>Cpanel</b>Controller</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to manage the content.</p>

    <form method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
        <span class="fa fa-envelope form-control-feedback"></span>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="fa fa-lock form-control-feedback"></span>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <br>
      <a href="{{ url('/password/reset') }}">Forgot my password?</a>
      <div class="text-center">
        <a href="{{ url('/') }}" class="fa fa-home"> Visit Website</a>
      </div>

    <br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection
