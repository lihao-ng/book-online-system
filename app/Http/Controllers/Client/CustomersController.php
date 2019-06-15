<?php

namespace App\Http\Controllers\Client;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Client\CustomerService;

class CustomersController extends Controller {
  protected $path = 'client.customers.';
  protected $customerService;

  public function __construct(CustomerService $customerService) {
    $this->customerService = $customerService;
  }

  public function showCart(){
    $customer = $this->customerService->transform(current_user()->customer);

    return view($this->path . 'cart', ['customer' => $customer]);
  }

  public function addAddress(Request $request) {
    return $this->customerService->createAddress($request);
  }

  public function updateMobile(Request $request) {
    $customer = current_user()->customer;

    return $this->customerService->updateMobile($request, $customer);
  }

  public function updateEmail(Request $request) {
    $customer = current_user()->customer;

    return $this->customerService->updateEmail($request, $customer);
  }

  public function editProfile(){
    $customer = current_user()->customer;
    $customer['email'] = $customer->user->email;
    $customer['addresses'] = $customer->addresses;

    return view($this->path . 'edit-profile', ['customer' => $customer]);
  }

  public function updateProfile(Request $request){
    $customer = current_user()->customer;
    return $this->customerService->updateProfile($request, $customer);
  }
}
