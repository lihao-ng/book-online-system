<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\CustomerService;
use App\User as Customer;

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

  public function create() {
    return view($this->path . 'create');
  }

  public function store(Request $request) {
    return $this->customerService->create($request);
  }

  public function destroy(Customer $customer) {
    $customer->delete();

    return success();
  }
}
