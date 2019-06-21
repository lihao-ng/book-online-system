@extends('client.layout.master')

@section('content')

<div class="container-fluid forgetPassword-main-container">
  <div class="container-fluid pb-5">
    <div class="container-fluid mb-4 text-center">
      <div class="forgetPassword-main-title font-weight-bold">
        Request For Password
      </div>
    </div>

    <div class="container-fluid forgetPassword-fullContent-container bg-white p-3 forgetPassword-shadow">
      <div class="text-uppercase">
        {!! Form::open(['route' => 'request.email', 'class' => 'form', 'id' => 'form-validation']) !!}
        <div class="container p-3 col-9">
          <div class="row justify-content-center pt-4 pb-4">
            <div class="col-12">
              <label class="contactUs-title">Enter your email to reset password:</label>
            </div>
            <div class="col-12">
              <input type="text" name="email" class="form-control">
            </div>
          </div>
          <div class="container p-4">
            <div class="row justify-content-center">
              <div class="col-8 text-center">
                <button class="contactUs-submit-button text-uppercase">Submit</button>
              </div>
            </div>
          </div>  
        </div>
        {!! Form::close() !!}
      </div>  
    </div>
  </div>
</div>

@endsection