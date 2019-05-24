@extends('admin.layout.partials.meta')

@section('content')
<div class="stranger-wrapper">
 
  <div class="main-panel">
    <div class="container-fluid">
      @yield('stranger-content')
    </div>
  </div>
</div>
@endsection