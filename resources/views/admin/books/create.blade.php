@extends('admin.layout.master')

@section('master-content')
@section('title')
Books
@endsection
<div class="row btn-back mb-4 ml-15">
  <div class="col-12 col-sm-3 col-lg-2 return-back">
    <a href="{{ route('admin.books.index') }}" class="d-block">
     <i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>
     Books
   </a>
 </div>
</div>

<div class="row pl-15">
  <div class="col-12 page-title">
    <h3>Create Book</h3>
  </div>
</div>

@include('admin.layout.partials.notification')

<div class="col-md-12 mt-5">
  <book-component></book-component>
</div>
@endsection