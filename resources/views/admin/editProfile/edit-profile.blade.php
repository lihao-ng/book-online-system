@extends('admin.layout.master')

@section('master-content')
@include('admin.layout.partials.notification')

<div class="container">
  <div class="card">
    <div class="row">
      <div class="col-12 d-flex">
        <h4 class="text-center mr-auto my-1 p-3">Profile Settings</h4>
      </div>
    </div>
    <div class="card-body">
      {!! Form::model(current_user(), ['route' => ['admin.profile.update'], 'enctype' => 'multipart/form-data', 'class' => 'form']) !!}
      <div class="form-group has-label">
        <label>Profile Picture
          <label>Name <span class="star">*</span></label>
        </label>
        <div class="d-flex">
          <img src="{{ avatar_picture_url(current_user()->avatar) }}" id="avatar-pic" class="border-gray img-thumbnail img-thumbnail-profile"><br>
          <div class="input-group mb-3 ml-3">
            <div class="custom-file">
              {{ Form::file('avatar', ['class' =>'custom-file-input on__file__change', 'id' => 'file-picker', 'data-target' => '#avatar-pic'])}}<br>
              <label class="custom-file-label" for="file-picker">Choose file</label>
            </div>
          </div>

        </div>
      </div>
      <div class="form-group has-label">
        <label>Name
          <span class="star">*</span>
        </label>
        {{ Form::text('name', current_user()->name, [ 'class'=>'form-control', 'required']) }}
      </div>
      <div class="form-group has-label">
        <label>Email
          <span class="star">*</span>
        </label>
        {{ Form::text('email', current_user()->email, ['class' => 'form-control disabled', 'required', 'disabled']) }}
      </div>

      <div class="text-right p-0">
        <button type="submit" class="btn btn-tertiary btn-fill btn-wd">Submit</button>
      </div>

      {!! Form::close() !!}
    </div>
  </div>
</div>

<div class="container mt-4">
  <div class="card">
    <div class="row">
      <div class="col-12 d-flex">
        <h4 class="text-center mr-auto my-1 p-3">Change Password</h4>
      </div>
    </div>
    <div class="card-body">
      {!! Form::open(['route' => ['admin.password.change'], 'method' => 'PUT', 'class' => 'form']) !!}
      <div class="form-group has-label">
        <label>Current Password
          <span class="star">*</span>
        </label>
        <input class="form-control" name="current_password" type="password" required="true" />
      </div>
      <div class="form-group has-label">
        <label>New Password
          <span class="star">*</span>
        </label>
        <input class="form-control" name="password" type="password" required="true" />
      </div>
      <div class="form-group has-label">
        <label>Confirm Password
          <span class="star">*</span>
        </label>
        <input class="form-control" name="password_confirmation" type="password" required="true" />
      </div>

      <div class="text-right p-0">
        <button type="submit" class="btn btn-tertiary btn-fill btn-wd">Submit</button>
      </div>

      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection