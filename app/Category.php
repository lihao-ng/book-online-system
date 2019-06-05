<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
  protected $fillable = [
    'name'
  ];

  public function books() {
     return $this->belongsToMany('App\Book', 'book_categories', 'category_id', 'book_id')->withTimestamps();
  }
}
