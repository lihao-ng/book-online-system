<?php

namespace App\Services\Client;

use App\Book;
use App\Cart;
use App\Customer;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class CartService extends TransformerService {
  public function search(Request $request) 
    $categories = Category::where('name', 'like', "%{$request->category}%")->limit(10)->get();

    return $this->transformCollection($categories);
  }

  public function transform($category) {
    return [
      'id' => $category->id,
      'name' => $category->name
    ];
  }
}
