@extends('client.layout.partials.meta')

@section('master-content')
@include('client.layout.partials.nav')

<div class="wrapper">
  @include('admin.layout.partials.notification')
  
  @yield('content')
</div>
@include('client.layout.partials.footer')
@endsection
