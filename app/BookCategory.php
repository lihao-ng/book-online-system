<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BookCategory extends Pivot {
  protected $table = 'book_categories';

  protected $fillable = [
    'book_id', 'category_id'
  ];

  public function books() {
    return $this->belongsTo('App\Book');
  }

  public function categories() {
    return $this->belongsTo('App\Category');
  }
}
