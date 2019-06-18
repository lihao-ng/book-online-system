@extends('client.layout.master')

@section('content')

<div class="container-fluid editProfile-main-container">
  <div class="container-fluid pb-4">
    <div class="container-fluid mb-4 text-center">
      <div class="editProfile-main-title font-weight-bold">
        Edit Profile
      </div>
    </div>

    <div class="container-fluid editProfile-fullContent-container bg-white p-3 editProfile-shadow">
      <div class="text-uppercase">
        {!! Form::model($customer, ['route' => ['customer.update.profile'], 'enctype' => 'multipart/form-data', 'class' => 'form']) !!}
        <div class="container">
          <div class="justify-content-center pt-3 pb-5 text-center">
            <img src="{{ avatar_picture_url(current_user()->avatar) }}" id="avatar-pic" class="editProfile-profilePic mx-auto">
          </div>
          {{ Form::file('avatar', ['class' =>'editProfile-inputProfilePic on__file__change', 'id' => 'file-picker', 'data-target' => '#avatar-pic']) }}
          <div class="row  pt-4 pb-3">
            <div class="col-12">
              <label class="contactUs-title">Name</label>
            </div>
            <div class="col-12">
              {{ Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => "Enter Name"]) }}
            </div>
          </div>
          <div class="row pb-4">
            <div class="col-12">
              <label class="contactUs-title">Email</label>
            </div>
            <div class="col-12">
              {{ Form::text('email', null, ['class' => 'form-control', 'required', 'placeholder' => "Enter E-mail"]) }}
            </div>
          </div>
          <div class="row pb-4">
            <div class="col-12">
              <label class="contactUs-title">Mobile No</label>
            </div>
            <div class="col-12">
              {{ Form::text('mobile', null, ['class' => 'form-control', 'required', 'placeholder' => "Enter Mobile Number"]) }}
            </div>
          </div>
          
          <address-component :default-addresses="{{ json_encode($customer->addresses) }}"></address-component>

          <div class="container p-4">
            <div class="row justify-content-center">
              <div class="col-8 text-center">
                <button class="contactUs-submit-button text-uppercase" type="submit">Submit</button>
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