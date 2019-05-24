@extends('admin.layout.partials.meta')

@section('content')
<div class="wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="d-none d-md-block col-md-3 col-lg-2" style="position:fixed;" id="sidebar">
        @include('admin.layout.partials.sidebar')    
      </div>

      <div class="col-12 offset-md-3 col-md-9 offset-lg-2 col-lg-10" id="main-content">
        <div class="main-panel">
          @include('admin.layout.partials.navbar')

          <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  @yield('master-content')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
