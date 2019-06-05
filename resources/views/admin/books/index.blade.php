@extends('admin.layout.master')

@section('master-content')
@section('title')
  Books
@endsection

<div class="card bootstrap-table">
  <div class="card-body table-full-width">
    <div class="toolbar d-flex">
      <a href="{{ route('admin.books.create') }}" class="ml-2">
        <button class="btn btn-secondary" name="create">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
      </a>
    </div>
    <table id="bootstrap-table" class="table" data-url="{{ route('admin.books.index') }}" data-icons="icons">
      <thead>
        <th data-field="id" class="text-center" data-sortable="true">ID</th>
        <th data-field="isbn" data-sortable="true">ISBN</th>
        <th data-field="title" data-sortable="true">Title</th>
        <th data-field="rating">Rating</th>
        <th data-field="sold">Sold</th>
        <th data-field="price">Price</th>
        <th data-field="actions" class="td-actions text-center"  data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
      </thead>
    </table>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  function operateFormatter(value, row, index) {
    return [
    '<a rel="tooltip" title="Edit" class="btn btn-link btn-warning btn-icon table-action edit" href="javascript:void(0)">',
    '<i class="fa fa-edit"></i>',
    '</a>',

    '<a rel="tooltip" title="Remove" class="btn btn-link btn-danger table-action remove" href="javascript:void(0)">',
    '<i class="fa fa-remove"></i>',
    '</a>'
    ].join('');
  }
</script>
@endsection
