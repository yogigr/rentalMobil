<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front.css') }}">
</head>
<body>
    @include('layouts.front-header')
    <main>
        @yield('content')
    </main>
    @include('layouts.front-footer')
    <!--WA BTN-->
    <a href="https://api.whatsapp.com/send?phone=62{{ substr(str_replace(' ', '', $contact->telp1), 1) }}" 
    class="whatsapp-float" target="_blank">
        <i class="fa fa-whatsapp whatsapp-float-icon"></i>
    </a>
    <script src="{{ asset('js/front.js') }}"></script>
</body>
</html>