<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\AuthorService;
use App\Services\Admin\BookService;

class AuthorsController extends Controller {
  protected $path = 'admin.authors.';
  protected $authorService;
  protected $bookService;

  public function __construct(AuthorService $authorService, BookService $bookService) {
    $this->authorService = $authorService;
    $this->bookService = $bookService;
  }

  public function index(Request $request) {
    if ($request->wantsJson()) {
      return $this->authorService->all($request);
    }

    return view($this->path . 'index');
  }

  public function create() {
    return view($this->path . 'create');
  }

  public function store(Request $request) {
    return $this->authorService->create($request);
  }

  public function edit(Author $author) {
    $result = $this->authorService->transform($author);
    $result['books'] = $this->bookService->transformCollection($author->books);

    return view($this->path . 'edit', ['author' => json_encode($result)]);
  }

  public function update(Request $request, Author $author) {
    return $this->authorService->update($request, $author);
  }

  public function destroy(Author $author) {
    $author->delete();
    return success();
  }

  public function search(Request $request) {
    return $this->authorService->search($request);
  }
}
