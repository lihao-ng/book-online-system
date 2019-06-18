@extends('client.layout.master')

@section('content')

<div class="container-fluid forgetPassword-main-container">
  <div class="container-fluid pb-5">
    <div class="container-fluid mb-4 text-center">
      <div class="forgetPassword-main-title font-weight-bold">
        Forget Password
      </div>
    </div>

    <div class="container-fluid forgetPassword-fullContent-container bg-white p-3 forgetPassword-shadow">
      <div class="text-uppercase">
        <div class="container p-3 col-9">
            <div class="row justify-content-center pt-4 pb-4">
              <div class="col-12">
                <label class="contactUs-title">New Password:</label>
              </div>
              <div class="col-12">
                <input type='text' class="form-control">
              </div>
            </div>
            <div class="row justify-content-center pb-4">
              <div class="col-12">
                <label class="contactUs-title">Confirm Password:</label>
              </div>
              <div class="col-12">
                <input type='text' class="form-control">
              </div>
            </div>
            <div class="container p-4">
              <div class="row justify-content-center">
                <div class="col-8 text-center">
                  <button class="contactUs-submit-button text-uppercase" href="#">Submit</button>
                </div>
              </div>
            </div>  
        </div>
      </div>  
    </div>
  </div>
</div>

@endsection