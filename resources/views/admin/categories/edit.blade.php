@extends('admin.layout.master')

@section('master-content')
@section('title')
Categories
@endsection

<div class="row btn-back mb-4 ml-15">
  <div class="col-12 col-sm-3 col-lg-2 return-back">
   <i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>
   <a href="{{ route('admin.categories.index') }}">Categories</a>
 </div>
</div>

<div class="row pl-15">
  <div class="col-12 page-title">
    <h3>Create Category</h3>
  </div>
</div>

@include('admin.layout.partials.notification')

<div class="col-md-12 mt-5">
  {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put', 'id' => 'FormValidation']) !!}
  <div class="card">
    <div class="card-body py-4 px-5">
      <div class="row">
        <div class="col-sm-6 mb-3">
          <h4>Category Details</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group has-label">
            <label>Name <span class="star">*</span></label>
            {{ Form::text('name', null, [ 'class'=>'form-control', 'required', 'placeholder' => "Enter Category Name here"]) }}
          </div>
        </div>
      </div>

      <div class="col-12 mt-3">
        <div class="row">
          <div class="col-12 col-md-4 ml-auto">
            <button type="submit" class="btn btn-warning btn-block">Create</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection