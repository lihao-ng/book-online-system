<?php

namespace App\Services\Admin;

use App\Book;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class BookService extends TransformerService {

  public function all(Request $request){
    $sort = $request->sort ? $request->sort : 'created_at';
    $order = $request->order ? $request->order : 'desc';
    $limit = $request->limit ? $request->limit : 10;
    $offset = $request->offset ? $request->offset : 0;
    $query = $request->search ? $request->search : '';

    $books = Book::where('title', 'like', "%{$query}%")->orderBy($sort, $order);
    $listCount = $books->count();

    $books = $books->limit($limit)->offset($offset)->get();

    return respond(['rows' => $this->transformCollection($books), 'total' => $listCount]);
  }

  public function create(Request $request) {
    $request->validate([
      "title" => "required",
      "description" => "required",
      // "category" => "required",
      // "price" => "required"
    ]);

    return redirect()->route('admin.admins.index');
  }

  public function transform($book){
    return [
      'id' => $book->id,
      'title' => $book->title,
      'author' => $book->author, // have to change to get collection of author
      'rating' => $book->rating,
      'sold' => $book->sold,
      'price' => $book->price
    ];
  }
}
