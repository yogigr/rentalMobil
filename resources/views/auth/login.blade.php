@extends('layouts.admin')
@section('title', 'Login')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}">{{ config('app.name') }}</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Silahkan Login</p>

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('login') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                <i class="fa fa-envelope form-control-feedback"></i>
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <i class="fa fa-lock glyphicon-lock form-control-feedback"></i>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div>
        </form>
        <a href="{{ url('password/reset') }}">Lupa password?</a><br>
    </div>
</div>
@endsection