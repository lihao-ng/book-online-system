@extends('admin.layout.master')

@section('master-content')
@section('title')
Customers
@endsection
<div class="row btn-back mb-4 ml-15">
  <div class="col-12 col-sm-3 col-lg-2 return-back">
    <a href="{{ route('admin.books.index') }}" class="d-block">
     <i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>
     Customers
   </a>
 </div>
</div>

<div class="row pl-15">
  <div class="col-12 page-title">
    <h3>Create Customer</h3>
  </div>
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
      <div class="text-right p-0">
        <button type="submit" class="btn btn-tertiary btn-fill btn-wd py-2 px-5 text-right">Create</button>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection