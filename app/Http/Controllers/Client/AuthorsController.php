<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Client\AuthorService;

class AuthorsController extends Controller {
  protected $authorService;

  public function __construct(AuthorService $authorService) {
    $this->authorService = $authorService;
  }

  public function search(Request $request) {
    return $this->authorService->search($request);
  }
}
