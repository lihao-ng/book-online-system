<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Client\BookService;

class CartsController extends Controller {
  protected $path = 'client.carts.';
  protected $bookService;

  public function __construct(BookService $bookService) {
    $this->bookService = $bookService;
  }

  public function showCart(){
    $cartItems = $this->bookService->transformCollection(current_user()->customer->books);

    return view($this->path . 'cart', ['items' => $cartItems]);
  }

  public function checkout(Request $request){
    dd("checkout");
  }
}
