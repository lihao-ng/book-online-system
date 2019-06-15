<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Client\CartService;

class CartsController extends Controller {
  protected $path = 'client.carts.';
  protected $cartService;

  public function __construct(CartService $cartService) {
    $this->cartService = $cartService;
  }

  public function update(Request $request){
    return $this->cartService->update($request);
  }

  public function delete(Request $request){
    return $this->cartService->delete($request);
  }

  public function checkout(Request $request){
    return $this->cartService->checkout($request);
  }
}
