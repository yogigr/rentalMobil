@extends('layouts.admin')
@section('title', 'Reset Password')
@section('content')

<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}">{{ config('app.name') }}</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Reset Password</p>

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/password/reset') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="text" name="email" value="{{ $email or old('email') }}" 
                class="form-control" placeholder="Email">
                <i class="fa fa-envelope form-control-feedback"></i>
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" name="password" class="form-control" placeholder="Password Baru">
                <i class="fa fa-lock glyphicon-lock form-control-feedback"></i>
            </div>
            <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password Baru">
                <i class="fa fa-lock glyphicon-lock form-control-feedback"></i>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div>
        </form>
    </div>
</div>

@endsection
