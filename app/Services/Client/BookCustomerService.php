<?php

namespace App\Services\Client;

use App\Book;
use App\Customer;
use App\Cart;
use Illuminate\Http\Request;

class BookCustomerService {
  public function addBookToCart(Book $book) {
    $customer = current_user()->customer;

    $ifExist = Cart::where('book_id', $book->id)->where('customer_id', $customer->id)->first();

    if(!$ifExist) {
      Cart::create([
        'book_id' => $book->id,
        'customer_id' => $customer->id
      ]);
    }

    return redirect()->route('show.cart');
  }
}
