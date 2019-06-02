<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\CategoryService;

class CategoriesController extends Controller {
  protected $path = 'admin.categories.';
  protected $categoryService;

  public function __construct(CategoryService $categoryService) {
    $this->categoryService = $categoryService;
  }

  public function index(Request $request) {
    if ($request->wantsJson()) {
      return $this->categoryService->all($request);
    }

    return view($this->path . 'index');
  }

  public function create() {
    return view($this->path . 'create');
  }

  public function store(Request $request) {
    return $this->categoryService->create($request);
  }

  public function edit(Category $category) {
    return view($this->path . 'edit', ['category' => $category]);
  }

  public function update(Request $request, Category $category) {
    return $this->categoryService->update($request, $category);
  }

  public function destroy(Category $category) {
    $category->delete();
    return success();
  }

  public function search(Request $request) {
    return $this->categoryService->search($request);
  }
}
