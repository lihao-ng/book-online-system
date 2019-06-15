@extends('admin.layout.master')

@section('master-content')
@section('title')
Dashboard
@endsection

<div class="container">
  <div class="row mt-5 justify-content-around">
    <div class="col-12 col-md-6 card p-2">
      <div class="row pl-15">
        <div class="col-12 page-title text-center">
          <h3>Bestselling Books</h3>
        </div>
      </div>
      <canvas id="books" data-books="{{ $books }}"></canvas>
    </div>

    <div class="col-12 col-md-5 card pt-4">
      <div class="row pl-15">
        <div class="col-12 page-title text-center">
          <h3>Admins & Customers</h3>
        </div>
      </div>
      <canvas id="users" data-admins="{{ $admins }}" data-customers="{{ $customers }}"></canvas>
    </div>

    <div class="col-12 col-md-8 card p-2 mt-5">
      <div class="row pl-15">
        <div class="col-12 page-title text-center">
          <h3>Sales This Year</h3>
        </div>
      </div>
      <canvas id="sales"></canvas>
    </div>
  </div>
</div>
@endsection