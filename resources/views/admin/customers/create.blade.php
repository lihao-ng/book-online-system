@extends('admin.layout.master')

@section('master-content')
<div class="row btn-back mb-4 ml-1">
  <i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>
  <a href="{{ route('admin.customers.index') }}">Customer</a>
</div>

<div class="page-title">
  <span class="page-text">Create Customer</span>
</div>

<div class="col-md-12 mt-5">
  {!! Form::open(['route' => 'admin.customers.store', 'class' => 'form', 'id' => 'form-validation']) !!}
  <div class="card">
    <div class="card-body py-4 px-5">
      <div class="row">
        <div class="col-sm-6 mb-3">
          <h4>Customer Details</h4>
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
						<button type="submit" class="btn btn-warning btn-fill btn-wd">Create</button>
			</div>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection