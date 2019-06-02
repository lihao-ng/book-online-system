<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
  protected $fillable = [
    'isbn', 'title', 'description', 'publisher', 'publication_date', 'publication_city', 'language', 'price', 'rating', 'sold', 'stock'
  ];

  public function cartItems() {
    return $this->belongsToMany('App\CartItem');
  }

  public function authors() {
    return $this->belongsToMany('App\Author', 'author_books', 'book_id', 'author_id')->withTimestamps();
  }

  public function categories() {
    return $this->belongsToMany('App\Category', 'book_categories', 'book_id', 'category_id')->withTimestamps();
  }
}