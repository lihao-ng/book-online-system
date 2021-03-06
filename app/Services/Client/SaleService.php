<?php

namespace App\Services\Client;

use App\Sale;
use App\Book;
use App\BookSale;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class SaleService extends TransformerService {

  public function create(Request $request) {
    $sale = Sale::create([
      'customer_id' => current_user()->customer->id,
      'address' => $request->address,
      'remark' => $request->remark,
      'collection' => $request->collection,
      'payment' => $request->payment
    ]);

    return $this->createBookSaleRecord(json_decode(json_encode($request->items)), $sale);
  }

  public function createBookSaleRecord($items, $sale) {
    $orders = [];

    foreach($items as $item) {
      $bookSale = BookSale::create([
        'book_id' => $item->id,
        'sale_id' => $sale->id,
        'amount' => $item->amount
      ]);

      $book = Book::find($item->id);
      $book->sold += $item->amount;
      $book->stock -= $item->amount;
      $book->save();

      array_push($orders, $bookSale);
    }

    return $orders;
  }

  public function transform($author){
    return [
      'id' => $author->id,
      'name' => $author->name,
      'description' => $author->description,
      'penName' => $author->pen_name,
      'birthday' => $author->birthday,
      'birthPlace' => $author->birth_place
    ];
  }
}
