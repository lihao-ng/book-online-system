<?php

namespace App\Services\Admin;

use App\Sale;
use App\BookSale;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class SaleService extends TransformerService {
  public function all(Request $request){
    $sort = $request->sort ? $request->sort : 'created_at';
    $order = $request->order ? $request->order : 'desc';
    $limit = $request->limit ? $request->limit : 10;
    $offset = $request->offset ? $request->offset : 0;
    $query = $request->search ? $request->search : '';

    $sales = BookSale::whereHas('sale.customer.user', function($user) use ($query) {
      $user->where('email', 'like', "%{$query}%");
    })->orderBy($sort, $order);

    $listCount = $sales->count();

    $sales = $sales->limit($limit)->offset($offset)->get();

    return respond(['rows' => $this->transformCollection($sales), 'total' => $listCount]);
  }

  public function transform($bookSale){
    return [
      'id' => $bookSale->id,
      'customer' => $bookSale->sale->customer->user->email,
      'book' => $bookSale->book->title,
      'amount' => $bookSale->amount,
      'collection' => $bookSale->sale->collection,
      'payment' => $bookSale->sale->payment,
      'remark' => $bookSale->sale->remark,
    ];
  }
}
