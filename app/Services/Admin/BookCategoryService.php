<?php

namespace App\Services\Admin;

use App\Book;
use App\Category;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class BookCategoryService {
  public function syncBookCategories(Book $book, $categories) {
    $ids = [];

    foreach($categories as $category) {
      if(array_key_exists('id', $category)) {
        if(Category::find($category->id)) {
          $ids[] = $category->id;
        }
      }
    }

    $book->categories()->sync($ids);
  }
}
