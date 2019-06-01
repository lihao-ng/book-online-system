<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\BookService;

class BooksController extends Controller {
  protected $path = 'admin.books.';
  protected $bookService;

  public function __construct(BookService $bookService) {
    $this->bookService = $bookService;
  }

  public function index(Request $request) {
    if ($request->wantsJson()) {
      return $this->bookService->all($request);
    }

    return view($this->path . 'index');
  }

  public function create() {
    return view($this->path . 'create');
  }

  public function store(Request $request) {
    return $this->bookService->create($request);
  }

  public function show(Book $book) {
        //
  }

  public function edit(Book $book) {
        //
  }

  public function update(Request $request, Book $book) {
        //
  }

  public function destroy(Book $book) {
        //
  }

  public function search(Request $request) {
    return $this->bookService->search($request);
  }
}
