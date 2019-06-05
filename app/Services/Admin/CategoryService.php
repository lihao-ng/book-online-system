<?php

namespace App\Services\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class CategoryService extends TransformerService {
  public function all(Request $request){
    $sort = $request->sort ? $request->sort : 'created_at';
    $order = $request->order ? $request->order : 'desc';
    $limit = $request->limit ? $request->limit : 10;
    $offset = $request->offset ? $request->offset : 0;
    $query = $request->search ? $request->search : '';

    $categories = Category::where('name', 'like', "%{$query}%")->orderBy($sort, $order);
    $listCount = $categories->count();

    $categories = $categories->limit($limit)->offset($offset)->get();

    return respond(['rows' => $this->transformCollection($categories), 'total' => $listCount]);
  }

  public function create(Request $request) {
    $request->validate([
      'name' => 'required|max:190|unique:categories'
    ]);

    Category::create([
      'name' => $request->name
    ]);

    return redirect()->route('admin.categories.index');
  }

  public function update(Request $request, Category $category) {
    $request->validate([
      'name' => 'required|max:190|unique:categories,name,' . $category->id
    ]);

    $category->name = $request->name;
    $category->save();

    return redirect()->route('admin.categories.index');
  }

  public function search(Request $request) {
    $categories = Category::where('name', 'like', "%{$request->search}%");

    if($request->except) {
      $ids = $this->getCategoriesId(json_decode(json_encode($request->except)));
      $exceptQuery = $categories->whereNotIn('id', $ids); 
    }
    
    return $categories->limit(10)->get();
  }

  public function getCategoriesId($categories) {
    $ids = [];

    foreach($categories as $category) {
      if(array_key_exists('id', $category)) {
        if(Category::find($category->id)) {
          $ids[] = $category->id;
        }
      }
    }

    return $ids;
  }

  public function transform($category){
    return [
      'id' => $category->id,
      'name' => $category->name
    ];
  }
}
