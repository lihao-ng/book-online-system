@if ($errors->any())
<div class="alert alert-danger mt-5" role="alert">
  <p class="alert-description">
    {{ $errors->first() }}
  </p>
</div>
@elseif (session('error'))
<div class="alert alert-danger mt-5" role="alert">
  <p class="alert-description">
    {{ session('error')}}
  </p>
</div>
@elseif (session('success'))
<div class="alert alert-success mt-5" role="alert">
  <p class="alert-description">
    {{ session('success') }}
  </p>
</div>
@endif
