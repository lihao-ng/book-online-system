@extends('admin.layout.partials.meta')

@section('master-content')
  <div class="wrapper">
    @include('admin.layout.partials.sidebar')
    <div class="main-panel">
      @include('admin.layout.partials.nav')

      <div class="content" id="admin-app">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
