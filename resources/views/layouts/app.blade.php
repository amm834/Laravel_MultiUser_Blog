<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link href=’http://mywebfont.appspot.com/css?font=myanmar3′ rel=’stylesheet’ type=’text/css’>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
    .myanmar3 {
      font-family: "Masterpiece Uni Sans",Myanmar3;
    }
    .preventCopy {
      user-select: none;
      -webki-touch-callout: none;
      -webki-user-select: none;
    }
  </style>
</head>

<body>
  <div id="main" class="myanmar3 preventCopy">

    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')

  </div>

  <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>