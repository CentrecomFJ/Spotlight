@extends('layouts.adminlogin')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header text-center">
        {{-- <a href="#" class="h1"><b>SPOTLIGHT</b>MIS</a> --}}
        <img src="{{ asset('images/spotlight-logo.svg') }}" alt="SPOTLIGHT-MIS Logo" class="brand-image elevation-3 img-fluid">        
        {{-- <img src="{{ asset('images/all-mower-spares-logo.png') }}" alt="AMS-MIS Logo" class="brand-image elevation-3 img-fluid"> --}}
    </div>
    <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        @if(\Session::has('message'))
        <p class="alert alert-info">
            {{ \Session::get('message') }}
        </p>
        @endif

        <form action="{{ route('login') }}" method="post">
            {{ csrf_field() }}
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @if($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
                @endif
            </div>
            <div class="input-group mb-3">
                <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @if($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            {{ trans('global.remember_me') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block" style="color: #fff; background-color: #0ea30c; border-color: #000;">{{ trans('global.login') }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- <div class="social-auth-links text-center mt-2 mb-3">
            <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
        </div> -->
        <!-- /.social-auth-links -->

        <p class="mb-1">
            <a href="{{ route('password.request') }}">{{ trans('global.forgot_password') }}</a>
        </p>
        <!-- <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
        </p> -->
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
@endsection