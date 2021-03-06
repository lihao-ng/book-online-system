@extends('client.layout.master')

@section('content')

<div class="container-fluid customerLogin-main-container">
  <div class="container-fluid pb-4">
    <div class="container-fluid mb-4 text-center">
      <div class="customerLogin-main-title font-weight-bold">
        Log In
      </div>
    </div>

    <div class="container-fluid customerLogin-fullContent-container bg-white p-3 mb-4 contactUs-shadow">
      {!! Form::open(['route' => 'customer.login', 'class' => 'form', 'id' => 'form-validation']) !!}
      <div class="text-uppercase">
        <div class="text-center container p-3 col-10">
          <form>
            <div class="row justify-content-center pt-4 pb-4">
              <div class="col-3 align-self-center">
                <label class="customerLogin-title">Email</label>
              </div>
              <div class="col-9">
                {{ Form::text('email', null, ['class' => 'form-control', 'required', 'placeholder' => "E-mail"]) }}
              </div>
            </div>
            <div class="row justify-content-center ">
              <div class="col-3 align-self-center">
                <label class="customerLogin-title">Password</label>
              </div>
              <div class="col-9">
                {{ Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => "Password"]) }}
              </div>
            </div>
            <div class="row pb-3">
              <div class="col-12 text-right">
                <a class="customerLogin-forgetPassword" href="{{ route('request.email.show') }}">forget password?</a>
              </div>
            </div>
            <div class="container p-4 mb-2">
              <div class="row justify-content-center">
                <div class="col-8 text-center">
                  <button class="customerLogin-submit-button text-uppercase" type="submit">Submit</button>
                </div>
              </div>
            </div> 
          </form>
          <div class="row mb-3">
            <div class="col-12 text-center">
              <div class="customerLogin-SignUp-container">
               Doesn't have an account? <a class="customerLogin-SignUp" href="{{ route('customer.register.show') }}">Sign Up now!</a>
             </div>
           </div>
         </div>
       </div>
     </div>
     {!! Form::close() !!}
   </div>
 </div>
</div>

@endsection