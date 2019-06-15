<?php

namespace App\Services\Client;

use App\Customer;
use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\Client\AddressService;
use App\Services\Client\CartService;

class CustomerService extends TransformerService {
  protected $addressService;
  protected $cartService;

  public function __construct(AddressService $addressService, CartService $cartService) {
    $this->addressService = $addressService;
    $this->cartService = $cartService;
  }

  public function createAddress(Request $request) {
    return $this->addressService->create($request);
  }

  public function updateMobile(Request $request, Customer $customer){
    $request->validate([
      "mobile" => 'required|string|max:11'
    ]);

    $customer->mobile = $request->mobile;
    $customer->save();

    return $customer->mobile;
  }

   public function updateEmail(Request $request, Customer $customer){
    $request->validate([
      "email" => 'required|email|string'
    ]);

    $user = $customer->user;

    $user->email = $request->email;
    $user->save();

    return $user->email;
  }

  public function transform($customer){
    return [
      'id' => $customer->id,
      'name' => $customer->name,
      'email' => $customer->user->email,
      'mobile' => $customer->mobile,
      'addresses' => $this->addressService->transformCollection($customer->addresses),
      'books' => $this->cartService->transformCollection($customer->books)
    ];
  }
}
