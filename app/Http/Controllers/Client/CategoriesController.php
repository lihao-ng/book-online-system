<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Client\CategoryService;

class CategoriesController extends Controller {
  protected $categoryService;

  public function __construct(CategoryService $categoryService) {
    $this->categoryService = $categoryService;
  }

  public function search(Request $request) {
    return $this->categoryService->search($request);
  }
}
