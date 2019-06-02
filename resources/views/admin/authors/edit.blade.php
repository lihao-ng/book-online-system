@extends('admin.layout.master')

@section('master-content')
<div class="row btn-back mb-4 ml-1">
  <i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>
  <a href="{{ route('admin.authors.index') }}">Authors</a>
</div>

<div class="page-title">
  <h3>Create Category</h3>
</div>

@include('admin.layout.partials.notification')

<div class="col-md-12 mt-5">
  <author-component :default-author="{{ $author }}"></author-component>
</div>
@endsection