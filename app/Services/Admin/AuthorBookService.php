<?php

namespace App\Services\Admin;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class AuthorBookService {
  public function syncBookAuthors(Book $book, $authors) {
    $ids = [];

    foreach($authors as $author) {
      if(array_key_exists('id', $author)) {
        if(Author::find($author->id)) {
          $ids[] = $author->id;
        }
      }
    }

    $book->authors()->sync($ids);
  }
}
