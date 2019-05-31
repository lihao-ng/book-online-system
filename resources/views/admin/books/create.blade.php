@extends('admin.layout.master')

@section('master-content')
<div class="row btn-back mb-4 ml-1">
  <i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>
  <a href="{{ route('admin.admins.index') }}">Books</a>
</div>
<span class="glyphicon glyphicon-chevron-left"></span>
<div class="page-title">
  <span class="page-text">Create Book</span>
</div>

<div class="col-md-12 mt-5">
  <book-component></book-component>
  <!-- {!! Form::open(['route' => 'admin.books.store', 'class' => 'form', 'id' => 'form-validation']) !!} -->
  <!-- <div class="card">
    <div class="card-body py-4 px-5">
      <div class="row">
        <div class="col-sm-6 mb-3">
          <h4>Book Details</h4>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group has-label">
            <label>Title <span class="star">*</span></label>
            {{ Form::text('title', null, [ 'class'=>'form-control datetimepicker', 'required', 'placeholder' => "Title"]) }}
          </div>
        </div>
      </div>
      
      <author-component></author-component>

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group has-label">
            <label>Description <span class="star">*</span></label>
            {{ Form::textarea('description', null, ['class' => 'form-control', 'required']) }}
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group has-label">
            <label>Publisher <span class="star">*</span></label>
            {{ Form::text('publisher', null, ['class' => 'form-control', 'required']) }}
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group has-label">
            <label>Publication Date <span class="star">*</span></label>
            {{ Form::text('publication_date', null, ['class' => 'form-control datepicker', 'required']) }}
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group has-label">
            <label>Language <span class="star">*</span></label>
            {{ Form::text('language', null, ['class' => 'form-control', 'required']) }}
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group has-label">
            <label>Price <span class="star">*</span></label>
            {{ Form::text('price', null, ['class' => 'form-control', 'required']) }}
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group has-label">
            <label>Stocks <span class="star">*</span></label>
            {{ Form::text('stock', null, ['class' => 'form-control', 'required']) }}
          </div>
        </div>
      </div>

      <div class="row text-right">
        <div class="offset-0 offset-md-9 col-12 col-md-3">
          <button type="submit" class="btn btn-warning btn-block">Create</button>
        </div>
      </div>
    </div>
  </div> -->
  <!-- {!! Form::close() !!} -->
</div>
@endsection