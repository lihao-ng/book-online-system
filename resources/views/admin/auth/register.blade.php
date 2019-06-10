@extends('admin.layout.stranger')

@section('stranger-content')
<div class="container">
  <form method="post" action="{{ route('admin.register') }}">
    @csrf
    <div class="row">
      <div class="col-4 mx-auto">
        <div class="card card-transparent p-3">
          <div class="card-body">
            <h1 class="card-title text-center mt-3 mb-4">
              Register
            </h1>
            <h6 class="card-subtitle mb-2">E-mail<span style="color:red;">*</span></h6>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </span>
              </div>
              <input type="text" name="email" class="form-control" placeholder="E-mail">
            </div>

            <h6 class="card-subtitle mb-2">Name<span style="color:red;">*</span></h6>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-address-book-o" aria-hidden="true"></i>
                </span>
              </div>
              <input type="text" name="name" class="form-control" placeholder="Name">
            </div>

            <h6 class="card-subtitle mb-2">Password<span style="color:red;">*</span></h6>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-key" aria-hidden="true"></i>
                </span>
              </div>
              <input type="text" name="password" class="form-control" placeholder="Password">
            </div>

            <h6 class="card-subtitle mb-2">Confirmed Password<span style="color:red;">*</span></h6>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-key" aria-hidden="true"></i>
                </span>
              </div>
              <input type="text" name="password_confirmation" class="form-control" placeholder="Retype Password">
            </div>

            <button type="submit" class="btn btn-tertiary btn-lg mb-3">Register</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection