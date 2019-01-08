<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @stack('styles')
</head>
<body class="hold-transition {{ !Auth::check() ? 'login-page' : 'skin-blue sidebar-mini' }}">
    @if(!Auth::check())
        @yield('content')
    @else
    <div class="wrapper">
        @include('layouts.admin-header')
        @include('layouts.admin-sidebar')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    @yield('title')
                    <small>@yield('description')</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    @yield('breadcrumb')
                </ol>
            </section>
            <section class="content container-fluid">
                @yield('content')
            </section>
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} <a href="{{ url('/') }}">{{ config('app.name') }}</a>.</strong> All rights reserved.
        </footer>
    </div>
    @endif
    <script src="{{ asset('js/admin.js') }}"></script>
    @stack('scripts')
</body>
</html>