<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Client\BookService;

class BooksController extends Controller {
  protected $bookService;

  public function __construct(BookService $bookService) {
    $this->bookService = $bookService;
  }

  public function search(Request $request) {
    return $this->bookService->search($request);
  }

  public function book(Request $request) {
    return $this->bookService->getBook($request);
  }
}
