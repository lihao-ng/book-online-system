<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\BookService;
use App\Services\Admin\AuthorService;
use App\Services\Admin\CategoryService;

class BooksController extends Controller {
  protected $path = 'admin.books.';
  protected $bookService;
  protected $authorService;
  protected $categoryService;

  public function __construct(BookService $bookService, AuthorService $authorService, CategoryService $categoryService) {
    $this->bookService = $bookService;
    $this->authorService = $authorService;
    $this->categoryService = $categoryService;
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

  public function edit(Book $book) {
    $result = $this->bookService->transform($book);
    $result['authors'] = $this->authorService->transformCollection($book->authors);
    $result['categories'] = $this->categoryService->transformCollection($book->categories);

    return view($this->path . 'edit', ['book' => json_encode($result)]);
  }

  public function update(Request $request, Book $book) {
    return $this->bookService->update($request, $book);
  }

  public function destroy(Book $book) {
        //
  }

  public function search(Request $request) {
    return $this->bookService->search($request);
  }
}
