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
    $customer = current_user();

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

    $orders = $this->saleService->create($request);
    // $this->clearCart();
    $items = $this->generateOrder($orders);
    $sum = $this->getSum($items);
    $pdf = app('dompdf.wrapper')->loadView('client.receipts.receipt', ['orders' => $items, 'sum' => $sum, 'customer' => $customer, 'address' => $request->address, 'payment' => $request->payment, 'collection' => $request->collection]);
    
    return $pdf->download('invoice.pdf');
  }

  public function generateOrder($orders) {
    $books = [];

    foreach($orders as $order) {
      $item = [];
      $item['book'] = $order->book;
      $item['amount'] = $order->amount;
      $item['total'] = $order->book->price * $order->amount;

      array_push($books, $item);
    }

    return $books;
  }

  public function getSum($items) {
    $sum = 0;

    foreach($items as $item) {
      $sum += $item['total'];
    }

    return $sum;
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
