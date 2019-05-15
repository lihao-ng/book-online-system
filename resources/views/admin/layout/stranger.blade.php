@extends('admin.layout.partials.meta')

@section('master-content')
<div class="stranger-wrapper">
 
  <div class="main-panel">
    <div class="container-fluid">
      @yield('content')
    </div>
  </div>
</div>
@endsection