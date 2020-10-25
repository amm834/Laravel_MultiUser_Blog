<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/decoupled-document/ckeditor.js"></script>
</head>
</head>
<body>
  <!-- Spinner -->
      @include('layouts.navbar')

  <div class="row g-0 my-3">
    <div class="col-md-4 mb-3">
      @include('layouts.sidenav')

    </div>
    <div class="col-md-8" id="main">
      @yield('content')
    </div>
    @include('layouts.footer')
  </div>
  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>