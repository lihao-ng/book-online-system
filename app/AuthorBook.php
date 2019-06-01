<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AuthorBook extends Pivot {
  protected $table = 'author_books';
  
  protected $fillable = [
    'author_id', 'book_id'
  ];

  public function book() {
    return $this->belongsTo('App\Book');
  }

  public function author() {
    return $this->belongsTo('App\Author');
  }
}