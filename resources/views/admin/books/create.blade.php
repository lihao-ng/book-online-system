@extends('admin.layout.master')

@section('master-content')
@section('title')
Books
@endsection
<div class="row btn-back mb-4 ml-1">
  <i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>
  <a href="{{ route('admin.admins.index') }}">Books</a>
</div>

<div class="page-title">
  <span class="page-text">Create Book</span>
</div>

<div class="col-md-12 mt-5">
  <book-component></book-component>
</div>
@endsection