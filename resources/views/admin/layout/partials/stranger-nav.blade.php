<div class="container-fluid">
  <div class="row justify-content-around">
    <div class="col-12 col-md-6 text-center text-md-left mt-2">
      <h1 class="stranger-title-section">BOOKIE</h1>
    </div>

    <div class="col-12 col-md-6 text-center text-md-right stranger-login-section">
      <a href="{{ route('admin.login.show') }}" class="{{ is_active('login') }}">
        <div class="d-inline-block m-3">
          <h5>Login</h5>
        </div>
      </a>

      @if(have_admin())
      <a href="{{ route('admin.register.show') }}" class="{{ is_active('register') }}">
        <div class="d-inline-block m-3">
          <h5>Register</h5>
        </div>
      </a>
      @endif
    </div>
  </div>
</div>