<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  </head>
  <body>
    <div>
      <div id="admin-app">
        @yield('content')
      </div>
    </div>
    <script src="{{ asset('js/admin.js') }}"></script>
    @yield('scripts')
  </body>
</html>
