<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
  protected $fillable = [
    'isbn', 'title', 'description', 'publisher', 'publication_date', 'publication_city', 'language', 'price', 'rating', 'sold', 'stock', 'image'
  ];

  public function authors() {
    return $this->belongsToMany('App\Author', 'author_books', 'book_id', 'author_id')->withTimestamps();
  }

  public function categories() {
    return $this->belongsToMany('App\Category', 'book_categories', 'book_id', 'category_id')->withTimestamps();
  }

  public function customers() {
    return $this->belongsToMany('App\Customer', 'carts', 'book_id', 'customer_id')->withTimestamps();
  }

  public function ratings() {
    return $this->hasMany('App\Rating');
  }
}