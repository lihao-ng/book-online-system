<?php

namespace App\Services\Admin;

use App\Author;
use App\Book;
use App\AuthorBook;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class AuthorBookService extends TransformerService {

  public function syncAuthorBook(Book $book, $requestAuthors) {
    $authors = [];

    foreach ($requestAuthors as $requestAuthor) {
      $authors[] = $requestAuthor['id'];  
    }

    $book->authors()->sync($authors);
  }

  public function transform($admin){
    return [
      'id' => $admin->id,
      'name' => $admin->name,
      'email' => $admin->email,
      'join_date' => date_to_human($admin->created_at)
    ];
  }
}
