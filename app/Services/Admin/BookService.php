<?php

namespace App\Services\Admin;

use App\Book;
use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\Admin\AuthorBookService;
use App\Services\Admin\BookCategoryService;

class BookService extends TransformerService {
  protected $bookAuthorService;
  protected $bookCategoryService;

  function __construct(AuthorBookService $authorBookService, BookCategoryService $bookCategoryService) {
    $this->authorBookService = $authorBookService;
    $this->bookCategoryService = $bookCategoryService;
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
      // 'isbn' => 'required|unique:books',
      // 'title' => 'required|max:190',
      // 'authors.*.id' => 'required|distinct',
      // 'description' => 'required',
      // 'publisher' => 'required',
      // 'publicationDate' => 'required|date_format:Y-m-d',
      // 'language' => 'required|max:190',
      // 'price' => 'required|numeric',
      // 'stock' => 'required|numeric',
      // 'categories' => 'required'
      'image.size' => 'required|max:2000'
    ]);
dd($request->image);
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

    $this->authorBookService->syncBookAuthors($book, json_decode(json_encode($request->authors)));
    $this->bookCategoryService->syncBookCategories($book, json_decode(json_encode($request->categories)));

    return route('admin.books.index');
  }

  public function update(Request $request, Book $book) {
    $request->validate([
      'isbn' => 'required|unique:books,isbn,' . $book->id,
      'title' => 'required|max:190',
      'authors' => 'required',
      'authors.*.id' => 'required|distinct',
      'description' => 'required',
      'publisher' => 'required',
      'publicationDate' => 'required|date_format:Y-m-d',
      'language' => 'required|max:190',
      'price' => 'required|numeric',
      'stock' => 'required|numeric',
      'categories' => 'required',
      'categories.*.id' => 'required|distinct'
      // 'image' => 'required'
    ]);

    $book->isbn = $request->isbn;
    $book->title = $request->title;
    $book->description = $request->description;
    $book->publisher = $request->publisher;
    $book->publication_date = $request->publicationDate;
    $book->language = $request->language;
    $book->price = $request->price;
    $book->rating = 0;
    $book->sold = 0;
    $book->stock = $request->stock;
    $book->save();

    $this->authorBookService->syncBookAuthors($book, json_decode(json_encode($request->authors)));
    $this->bookCategoryService->syncBookCategories($book, json_decode(json_encode($request->categories)));

    return route('admin.books.index');
  }

  public function search(Request $request) {
    $books = Book::where('title', 'like', "%{$request->search}%");

    if($request->except) {
      $ids = $this->getBooksId(json_decode(json_encode($request->except)));
      $exceptQuery = $books->whereNotIn('id', $ids); 
    }
    
    return $this->transformCollection($books->limit(10)->get());
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
      'publicationDate' => date_to_human($book->publication_date),
      'language' => $book->language,
      'price' => $book->price,
      'rating' => $book->rating,
      'sold' => $book->sold,
      'stock' => $book->stock,
      'image' => $book->image
    ];
  }
}
