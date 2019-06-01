<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\AuthorService;

class AuthorsController extends Controller {
  protected $path = 'admin.authors.';
  protected $authorService;

  public function __construct(AuthorService $authorService) {
    $this->authorService = $authorService;
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
    $author = $this->authorService->transform($author);
    return view($this->path . 'edit', ['author' => json_encode($author)]);
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
