@extends('admin.layout.master')

@section('master-content')
<div class="row btn-back mb-4 ml-1">
  <i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>
  <a href="{{ route('admin.admins.index') }}">Admins</a>
</div>

<div class="page-title">
  <span class="page-text">Edit Admin</span>
</div>

<div class="col-md-12 mt-5">
  {!! Form::model($admin, ['route' => ['admin.admins.update', $admin], 'method' => 'put', 'id' => 'FormValidation']) !!}
  <div class="card">
    <div class="card-body py-4 px-5">
      <div class="row">
        <div class="col-sm-6 mb-3">
          <h4>Admin Details</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group has-label">
            <label>Name <span class="star">*</span></label>
            {{ Form::text('name', null, [ 'class'=>'form-control', 'required', 'placeholder' => "Name"]) }}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group has-label">
            <label>E-mail <span class="star">*</span></label>
            {{ Form::text('email', null, ['class' => 'form-control', 'required', 'placeholder' => "E-mail"]) }}
          </div>
        </div>
      </div>
      <div class="text-right">
						<button type="submit" class="btn btn-warning btn-fill btn-wd">Save</button>
			</div>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection