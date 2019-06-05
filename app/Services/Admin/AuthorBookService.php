<?php

namespace App\Services\Admin;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class AuthorBookService {
  public function syncBookAuthors(Book $book, $authors) {
    if($authors == null || $authors == "") {
      return;
    }

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

  public function syncAuthorBooks(Author $author, $books) {  
    if($books == null || $books == "") {
      return;
    }

    $ids = [];

    foreach($books as $book) {
      if(array_key_exists('id', $book)) {
        if(Book::find($book->id)) {
          $ids[] = $book->id;
        }
      }
    }

    $author->books()->sync($ids);
  }
}
