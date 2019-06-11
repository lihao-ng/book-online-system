@extends('client.layout.partials.meta')

@section('master-content')
  @include('client.layout.partials.nav')
  <div class="wrapper">
    @yield('content')
  </div>
  @include('client.layout.partials.footer')
@endsection
