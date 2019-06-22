@extends('admin.layout.master')

@section('master-content')
@section('title')
Sales
@endsection

<div class="card bootstrap-table">
  <div class="card-body table-full-width"> 
    <div class="toolbar d-flex">
    </div>
    <table id="bootstrap-table" class="table" data-url="{{ route('admin.sales.index') }}" data-icons="icons">
      <thead>
        <th data-field="id" class="text-center" data-sortable="true">ID</th>
        <th data-field="customer" data-sortable="true">Customer</th>
        <th data-field="book" data-sortable="true">Book</th>
        <th data-field="amount" data-sortable="true">Amount</th>
        <th data-field="collection" data-sortable="true">Collection</th>
        <th data-field="payment" data-sortable="true">Payment</th>
        <th data-field="remark" data-sortable="true">Remark</th>
      </thead>
    </table>
  </div>
</div>
@endsection