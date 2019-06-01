<?php

namespace App\Services\Admin;

use App\Book;
use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\Admin\BookService;

class BookService extends TransformerService {
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

    $books = Book::where('title', 'like', "%{$query}%")->orderBy($sort, $order);
    $listCount = $books->count();

    $books = $books->limit($limit)->offset($offset)->get();

    return respond(['rows' => $this->transformCollection($books), 'total' => $listCount]);
  }

  public function create(Request $request) {
    $request->validate([
      'isbn' => 'required|unique:books',
      'title' => 'required|max:190',
      'authors.*.id' => 'required|distinct',
      'description' => 'required',
      'publisher' => 'required',
      'publicationDate' => 'required|date_format:Y-m-d',
      'language' => 'required|max:190',
      'price' => 'required|numeric',
      'stock' => 'required|numeric'
      // 'categories' => 'required'
      // 'image' => 'required'
    ]);

    $book = Book::create([
      'isbn' => $request->isbn,
      'title' => $request->title,
      'description' => $request->description,
      'publisher' => $request->publisher,
      'publication_date' => $request->publicationDate,
      'language' => $request->language,
      'price' => $request->price,
      'rating' => 0,
      'sold' => 0,
      'stock' => $request->stock
    ]);

    $this->authorBookService->syncAuthorBook($book, $request->authors);

    return redirect()->route('admin.admins.index');
  }

  public function search(Request $request) {
    $books = Book::where('title', 'like', "%{$request->search}%");

    if($request->except) {
      $exceptQuery = $books->whereNotIn('id', $request->except); 
    }
    
    return $books->limit(10)->get();
  }

  public function getBooksId($books) {
    $ids = [];

    foreach($books as $book) {
      if(array_key_exists('id', $book)) {
        if(Book::find($book->id)) {
          $ids[] = $book->id;
        }
      }
    }

    return $ids;
  }

  public function transform($book){
    return [
      'id' => $book->id,
      'isbn' => $book->isbn,
      'title' => $book->title, // have to change to get collection of author
      'description' => $book->description,
      'publisher' => $book->publisher,
      'publication_date' => date_to_human($book->publication_date),
      'language' => $book->language,
      'price' => $book->price,
      'rating' => $book->rating,
      'sold' => $book->sold,
      'stock' => $book->stock,
      'image' => $book->image
    ];
  }
}
