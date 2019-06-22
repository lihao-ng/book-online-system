<ul class="sidebar-nav">
  <a href="#">
    <li class="sidebar-brand">
      <h2>BOOKIE</h2>
    </li>
  </a>
  <a href="{{ route('admin.dashboard') }}">
    <li class="sidebar-account {{ is_active('dashboard') }}">
      <i class="fa fa-line-chart" aria-hidden="true"></i>
      Dashboard
    </li>
  </a>
  <a href="{{ route('admin.admins.index') }}">
    <li class="{{ is_active('admins') }}">
      <i class="fa fa-user" aria-hidden="true"></i>
      Admins
    </li>
  </a>
  <a href="{{ route('admin.customers.index') }}">
    <li class="{{ is_active('customers') }}">
      <i class="fa fa-users" aria-hidden="true"></i>
      Customers
    </li>
  </a>
  <a href="{{ route('admin.books.index') }}">
    <li class="{{ is_active('books') }}">
      <i class="fa fa-book" aria-hidden="true"></i>
      Books
    </li>
  </a>
  <a href="{{ route('admin.sales.index') }}">
    <li class="{{ is_active('sales') }}">
      <i class="fa fa-money" aria-hidden="true"></i>
      Sales
    </li>
  </a>
  <a href="{{ route('admin.authors.index') }}">
    <li class="{{ is_active('authors') }}">
      <i class="fa fa-address-book" aria-hidden="true"></i>
      Authors
    </li>
  </a>
  <a href="{{ route('admin.categories.index') }}">
    <li class="{{ is_active('categories') }}">
      <i class="fa fa-bars" aria-hidden="true"></i>
      Categories
    </li>
  </a>
</ul>