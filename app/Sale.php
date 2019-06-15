<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model {
  protected $fillable = [
    'customer_id', 'address', 'remark', 'collection', 'payment'
  ];

  public function customer() {
    return $this->belongsTo('App\Customer');
  }

  public function books() {
    return $this->belongsToMany('App\Book', 'book_sales', 'sale_id', 'book_id')->withPivot('amount')->withTimestamps();
  }
}
