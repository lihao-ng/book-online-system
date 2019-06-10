<div class="topnav d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2 ml-2">@yield('title')</h1>

  <div class="dropdown mr-5">
    <button class="btn btn-tertiary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Settings 
      <i class="fa fa-cogs" aria-hidden="true"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="{{ route('admin.profile.show') }}">Edit Profile</a>
      <a class="dropdown-item" href="{{ route('admin.logout') }}">Log Out</a>
    </div>
  </div>
</div>