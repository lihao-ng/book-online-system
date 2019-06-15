<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BookSale extends Pivot {
  protected $fillable = [
    'book_id', 'sale_id', 'amount'
  ];

  public function book() {
    return $this->belongsTo('App\Book');
  }

  public function sale() {
    return $this->belongsTo('App\Sale');
  }
}
