@extends('admin.layout.partials.meta')

@section('content')
<div class="stranger-wrapper">
  @include('admin.layout.partials.stranger-nav')

  <div class="main-panel">
    <div class="container-fluid mt-2">
      <div class="row">
        <div class="col-12 col-md-6 mx-auto">
          @include('admin.layout.partials.notification')
        </div>
      </div>

      @yield('stranger-content')
    </div>
  </div>
</div>
@endsection