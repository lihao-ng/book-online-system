<?php

namespace App\Services\Admin;

use Storage;
use App\Author;
use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\Admin\AuthorBookService;

class AuthorService extends TransformerService {
  protected $authorBookService;

  function __construct(AuthorBookService $authorBookService) {
    $this->authorBookService = $authorBookService;
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
    // dd($request);
    // $value = base64_decode($request->image['base64']);
    // dd($value);
    // dd($request->file('image'));
    $file = $request->file('image');
    // Storage::disk('local')->put($file, 'Contents');
    // $path = $file->storeAs('photos', 'hihi.jpg');
    Storage::disk('public')->putFileAs('public', $file, 'hihi.jpg');
    dd('done');
    $request->validate([
      // 'name' => 'required|max:190',
      // 'description' => 'required',
      // 'penName' => 'required|max:190|unique:authors,pen_name',
      // 'birthday' => 'required|date_format:Y-m-d',
      // 'birthPlace' => 'nullable|max:190',
      // 'image' => 'nullable',
      // 'books' => 'nullable',
      // 'books.*.id' => 'required|distinct'
    ]);
dd($request->image);
    // store image here first and return the file name

    $author = Author::create([
      'name' => $request->name,
      'description' => $request->description,
      'pen_name' => $request->penName,
      'birthday' => $request->birthday,
      'birth_place' => $request->birthPlace,
      'image' => null  // change to image file name
    ]);

    if($request->books) {
      $this->authorBookService->syncAuthorBooks($author, json_decode(json_encode($request->books)));
    }
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
      'books' => 'nullable',
      'books.*.id' => 'required|distinct'
    ]);

    // new image

    $author->name = $request->name;
    $author->description = $request->description;
    $author->pen_name = $request->penName;
    $author->birthday = $request->birthday;
    $author->birth_place = $request->birthPlace;
    $author->image = null; // change here
    $author->save();

    $this->authorBookService->syncAuthorBooks($author, json_decode(json_encode($request->books)));

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

  public function transform($author){
    return [
      'id' => $author->id,
      'name' => $author->name,
      'description' => $author->description,
      'penName' => $author->pen_name,
      'birthday' => $author->birthday,
      'birthPlace' => $author->birth_place,
      'image' => $author->image
    ];
  }
}
