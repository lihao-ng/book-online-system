@extends('admin.layout.master')

@section('master-content')
<div class="container">
  <div class="row">
    <div class="col-12 col-md-3 card p-1 m-1">
      Admin
    </div>
    <div class="col-12 col-md-3 card p-1 m-1">
      Customer
    </div>
    <div class="col-12 col-md-3 card p-1 m-1">
      Books
    </div>
    <div class="col-12 col-md-3 card p-1 m-1">
      Sales
    </div>
    <div class="col-12 col-md-3 card p-1 m-1">
      Sales
    </div>
  </div>

  <div class="row mt-5 justify-content-around">
    <div class="col-12 col-md-6 card p-2">
      <canvas id="books" data-books="{{ $books }}"></canvas>
    </div>

    <div class="col-12 col-md-5 card pt-4">
      <canvas id="users" data-admins="{{ $admins }}" data-customers="{{ $customers }}"></canvas>
    </div>

    <div class="col-12 col-md-8 card p-2 mt-5">
      <canvas id="sales"></canvas>
    </div>
  </div>
</div>
@endsection