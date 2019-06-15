<?php

namespace App\Services\Client;

use App\Address;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class AddressService extends TransformerService {
  public function create(Request $request){
    $request->validate([
      "address" => 'required|string'
    ]);

    $customer = current_user()->customer;
    $ifExist = Address::where('customer_id', $customer->id)->where('address', $request->address)->first();

    if($ifExist) {
      return validation_error();
    }

    Address::create([
      'address' => $request->address,
      'customer_id' => $customer->id
    ]);

    return $this->transformCollection($customer->addresses);
  }

  public function transform($address){
    return [
      'id' => $address->id,
      'address' => $address->address
    ];
  }
}
