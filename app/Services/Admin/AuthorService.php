<?php

namespace App\Services\Admin;

use App\Author;
use Illuminate\Http\Request;
use App\Services\TransformerService;
// use App\Services\Admin\BookService;

class AuthorService extends TransformerService {
  // protected $bookService;

  function __construct() {
    // $this->bookService = $bookService;
  }

  public function all(Request $request){
    $sort = $request->sort ? $request->sort : 'created_at';
    $order = $request->order ? $request->order : 'desc';
    $limit = $request->limit ? $request->limit : 10;
    $offset = $request->offset ? $request->offset : 0;
    $query = $request->search ? $request->search : '';

    $authors = Author::where('name', 'like', "%{$query}%")->orderBy($sort, $order);
    $listCount = $authors->count();

    $authors = $authors->limit($limit)->offset($offset)->get();

    return respond(['rows' => $this->transformCollection($authors), 'total' => $listCount]);
  }

  public function create(Request $request) {
    $request->validate([
      'name' => 'required|max:190',
      'description' => 'required',
      'penName' => 'required|max:190|unique:authors,pen_name',
      'birthday' => 'required|date_format:Y-m-d',
      'birthPlace' => 'nullable|max:190',
      'image' => 'nullable',
      'books' => 'required',
      'books.*' => 'required',
      'books.*.id' => 'required|distinct', 
    ]);

    // store image here first and return the file name

    $author = Author::create([
      'name' => $request->name,
      'description' => $request->description,
      'pen_name' => $request->penName,
      'birthday' => $request->birthday,
      'birth_place' => $request->birthPlace,
      'image' => null  // change to image file name
    ]);

    $this->syncBooks($request->books, $author);

    return route('admin.authors.index');
  }

  public function update(Request $request, Author $author) {
    $request->validate([
      'name' => 'required|max:190',
      'description' => 'required',
      'penName' => 'required|max:190|unique:authors,pen_name,'. $author->id,
      'birthday' => 'required|date_format:Y-m-d',
      'birthPlace' => 'nullable|max:190',
      'image' => 'nullable',
      'books' => 'required',
      'books.*' => 'required',
      'books.*.id' => 'required|distinct', 
    ]);

    // new image

    $author->name = $request->name;
    $author->description = $request->description;
    $author->pen_name = $request->penName;
    $author->birthday = $request->birthday;
    $author->birth_place = $request->birthPlace;
    $author->image = null; // change here
    $author->save();

    $this->syncBooks($request->books, $author);

    return route('admin.authors.index');
  }

  public function search(Request $request) {
    $authors = Author::where('name', 'like', "%{$request->search}%");

    if($request->except) {
      $ids = $this->getAuthorsId(json_decode(json_encode($request->except)));
      $exceptQuery = $authors->whereNotIn('id', $ids); 
    }
    
    return $this->transformCollection($authors->limit(10)->get());
  }

  public function getAuthorsId($authors) {
    $ids = [];

    foreach($authors as $key => $author) {
      if(array_key_exists('id', $author)) {
        if(Author::find($author->id)) {
          $ids[] = $author->id;
        }
      }
    }

    return $ids;
  }

  // public function syncBooks($books, $author) {
  //   $ids = $this->bookService->getBooksId(json_decode(json_encode($books)));
  //   $author->books()->sync($ids);
  // }

  public function transform($author){
    return [
      'id' => $author->id,
      'name' => $author->name,
      'description' => $author->description,
      'penName' => $author->pen_name,
      'birthday' => $author->birthday,
      'birthPlace' => $author->birth_place,
      'image' => $author->image
      // 'books' => $this->bookService->transformCollection($author->books)
    ];
  }
}
