@extends('layouts.admin')
@section('title', 'Lupa Password')
<!-- Main Content -->
@section('content')

<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}">{{ config('app.name') }}</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Lupa Password</p>

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}

            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                <i class="fa fa-envelope form-control-feedback"></i>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    Kirim Link Reset Password
                </button>
            </div>
        </form>
        <a href="{{ url('login') }}">Login?</a><br>
    </div>
</div>
@endsection
