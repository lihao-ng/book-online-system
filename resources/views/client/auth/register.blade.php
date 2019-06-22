@extends('client.layout.master')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12 section-title-container my-auto">
      <div class="section-title text-center">Register</div>
      <div class="section-subtitle text-center">Home/Register</div>
    </div>  
  </div>
</div>

<div class="container-fluid register-main-container">
  <div class="container-fluid py-5">       
    <div class="container-fluid bg-white p-3 mb-4 contactUs-shadow" style="width: 50%">
      <div class="text-uppercase">
        <div class="container p-3 col-11">
          {!! Form::open(['route' => 'customer.register', 'class' => 'form', 'id' => 'form-validation']) !!}
            <div class="row justify-content-center pt-4 pb-2">
              <div class="col-12 align-self-center register-column">
                <label class="register-labels">Full name:</label>
              </div>
            </div>
            <div class="row justify-content-center">                          
              <div class="col-12">
                {{ Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => "Enter Name"]) }}
              </div>
            </div>

            <div class="row justify-content-center pt-4 pb-2">
              <div class="col-12 align-self-center register-column">
                <label class="register-labels">E-mail:</label>
              </div>
            </div>
            <div class="row justify-content-center">                          
              <div class="col-12">
                {{ Form::text('email', null, ['class' => 'form-control', 'required', 'placeholder' => "E-mail"]) }}
              </div>
            </div>

            <div class="row justify-content-center pt-4 pb-2">
              <div class="col-12 align-self-center register-column">
                <label class="register-labels">Mobile</label>
              </div>
            </div>
            <div class="row justify-content-center">                          
              <div class="col-12">
                {{ Form::text('mobile', null, ['class' => 'form-control', 'required', 'placeholder' => "Enter Mobile"]) }}
              </div>
            </div>

            <address-component class="address-bar pt-4"></address-component>

            <div class="row justify-content-center pt-4 pb-2">
              <div class="col-12 align-self-center register-column">
                <label class="register-labels">Password:</label>
              </div>
            </div>
            <div class="row justify-content-center">                          
              <div class="col-12">
                {{ Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => "Password"]) }}
              </div>
            </div>

            <div class="row justify-content-center pt-4 pb-2">
              <div class="col-12 align-self-center register-column">
                <label class="register-labels">Re-type password:</label>
              </div>
            </div>
            <div class="row justify-content-center">                          
              <div class="col-12">
                {{ Form::password('password_confirmation', ['class' => 'form-control', 'required', 'placeholder' => "Re-type Password"]) }}
              </div>
            </div>                   

            <div class="container p-4 mb-2">
              <div class="row justify-content-center">
                <div class="col-8 text-center">
                  <button class="customerLogin-submit-button text-uppercase" type="submit">Sign Up</button>
                </div>
              </div>
            </div> 
          {!! Form::close() !!}                   
        </div>
      </div>
    </div>
  </div>
</div>

@endsection