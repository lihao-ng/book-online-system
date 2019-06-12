<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    <link href="{{ mix('css/client.css') }}" rel="stylesheet">

    @yield('styles')
  </head>

  <body>
    <div>
      <div id="client-app">
        @yield('master-content')
      </div>
    </div>
    
    <script src="{{ mix('js/client.js') }}"></script>
    @yield('scripts')
  </body>
</html>
