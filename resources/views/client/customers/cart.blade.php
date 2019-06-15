@extends('client.layout.master')

@section('content')

<cart-component :default-customer="{{ json_encode($customer) }}"></cart-component>

@endsection
