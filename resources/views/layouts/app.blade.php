<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid wrapper">
        @include('inc.nav')

        @yield('hero')
        @yield('sidebar')

        <section class="main-content">
            
            @include('inc.message')
            @yield('content')
        </section>
        @include('inc.footer')
    </div>
     <!-- Bootstrap and JavaScript -->
     <script src="{{ asset('js/app.js') }}"></script>
     @yield('scripts')
</body>
</html>
