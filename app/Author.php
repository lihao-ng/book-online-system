<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model {
  protected $fillable = [
    'name', 'description', 'pen_name', 'birthday', 'birth_place', 'image'
  ];

  public function books() {
    return $this->belongsToMany('App\Book', 'author_books', 'author_id', 'book_id')->withTimestamps();
  }
}