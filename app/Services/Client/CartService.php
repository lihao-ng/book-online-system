<?php

namespace App\Services\Client;

use App\Book;
use App\Cart;
use App\Customer;
use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\Client\BookService;
use App\Services\Client\SaleService;

class CartService extends TransformerService {
  protected $bookService;
  protected $saleService;

  public function __construct(BookService $bookService, SaleService $saleService) {
    $this->bookService = $bookService;
    $this->saleService = $saleService;
  }

  public function getItems() {
    return $this->transformCollection(current_user()->customer->books);
  }

  public function update(Request $request) {
    $customer = current_user()->customer;
    $cartItem = Cart::where('book_id', $request->book)->where('customer_id', $customer->id)->first();

    $cartItem->amount = $request->amount ? $request->amount : 0;
    $cartItem->save();

    return $this->transform($customer->books()->where('book_id', $cartItem->book_id)->first());
  }

  public function delete(Request $request) {
    $customer = current_user()->customer;

    $cartItem = Cart::where('book_id', $request->book)->where('customer_id', $customer->id)->first();

    $cartItem->delete();
    return success();
  }

  public function checkout(Request $request) {
    $request->validate([
      "address" => 'required',
      "items" => 'required',
      "items.*" => 'required',
      "remark" => 'nullable|string',
      "collection" => 'required|string',
      "payment" => 'required|string',
    ]);

    $bookName = $this->bookService->validateStock(json_decode(json_encode($request->items)));

    if($bookName) {
      return response()->json([
        'errors' => [
          'book' => [$bookName . ' does not have enough stock. Please remove it from the cart.']
        ]
      ], 422);
    }

    $this->saleService->create($request);
    $this->clearCart();

    return route('show.cart');
  }

  public function clearCart() {
    $customer = current_user()->customer;

    $cartItems = Cart::where('customer_id', $customer->id)->get();

    foreach($cartItems as $cartItem) {
      $cartItem->delete();
    }
  }

  public function transform($book) {
    return [
      'id' => $book->id,
      'book' => $this->bookService->transform($book),
      'amount' => $book->pivot->amount
    ];
  }
}
