@extends('client.layout.master')

@section('content')

<div class="container-fluid cartPage-main-container">
  <div class="container-fluid">
    <div class="cartPage-mycart-title font-weight-bold text-center mb-4">
      My Cart
    </div>
  </div>

  <cart-component :default-items="{{ json_encode($items) }}"></cart-component>
</div>
@endsection
