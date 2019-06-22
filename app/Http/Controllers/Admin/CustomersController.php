<?php

namespace App\Http\Controllers\Admin;

use App\User as Customer;
use App\Cart;
use App\Address;
use App\Sale;
use App\BookSale;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\CustomerService;

class CustomersController extends Controller{
  protected $path = 'admin.customers.';
  protected $customerService;

  public function __construct(CustomerService $customerService) {
    $this->customerService = $customerService;
  }

  public function index(Request $request) {
    if ($request->isJson()) {
      return $this->customerService->all($request);
    }
    
    return view($this->path . 'index');
  }

  // public function create() {
  //   return view($this->path . 'create');
  // }

  // public function store(Request $request) {
  //   return $this->customerService->create($request);
  // }

  public function destroy(Customer $customer) {
    $user = $customer;
    $customer = $user->customer;

    Cart::where('customer_id', $customer->id)->delete();
    
    BookSale::whereHas('sale.customer', function($customerSale) use ($customer) {
      $customerSale->where('id', $customer->id);
    })->delete();
    Sale::where('customer_id', $customer->id)->delete();
    Address::where('customer_id', $customer->id)->delete();
  
    $customer->delete();
    $user->delete();

    return success();
  }
}
