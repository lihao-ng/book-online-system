<?php

namespace App\Services\Admin;

use App\Book;
use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\Admin\AuthorBookService;
use App\Services\Admin\BookCategoryService;
use App\Services\Admin\ImageLibraryBookService;

class BookService extends TransformerService {
  protected $bookAuthorService;
  protected $bookCategoryService;
  protected $imageLibraryService;

  function __construct(AuthorBookService $authorBookService, BookCategoryService $bookCategoryService, ImageLibraryService $imageLibraryService) {
    $this->authorBookService = $authorBookService;
    $this->bookCategoryService = $bookCategoryService;
    $this->imageLibraryService = $imageLibraryService;
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
    $request = $this->decodeArrayObjects($request);

    $request->validate([
      'isbn' => 'required|unique:books',
      'title' => 'required|max:190',
      'description' => 'required',
      'publisher' => 'required',
      'publicationDate' => 'required|date_format:Y-m-d',
      'language' => 'required|max:190',
      'price' => 'required|numeric',
      'stock' => 'required|numeric',
      'image' => 'nullable|image|max:2000',
      'categories' => 'required',
      'categories.*' => 'required',
      'authors' => 'required',
      'authors.*' => 'required'
    ]);

    $fileName = $this->imageLibraryService->create($request);

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
      'stock' => $request->stock,
      'image' => $fileName
    ]);

    $this->authorBookService->syncBookAuthors($book, $request->authors);
    $this->bookCategoryService->syncBookCategories($book, $request->categories);

    return route('admin.books.index');
  }

  public function update(Request $request, Book $book) {
    $request = $this->decodeArrayObjects($request);
    
    $request->validate([
      'isbn' => 'required|unique:books,isbn,' . $book->id,
      'title' => 'required|max:190',
      'description' => 'required',
      'publisher' => 'required',
      'publicationDate' => 'required|date_format:Y-m-d',
      'language' => 'required|max:190',
      'price' => 'required|numeric',
      'stock' => 'required|numeric',
      'categories' => 'required',
      'categories.*' => 'required',
      'authors' => 'required',
      'authors.*' => 'required'
    ]);

    $file = $request->file('image');
    $ifValid = $this->imageLibraryService->validateImage($file);
    
    if(!$ifValid) {
      return response()->json([
        'errors' => [
          'image' => ['Must be an image, 2000KB and the min dimension of 640x960']
        ]
      ], 422);
    }

    $fileName = $this->imageLibraryService->update($request, $book->image);

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
    $book->image = $fileName;
    $book->save();

    $this->authorBookService->syncBookAuthors($book, $request->authors);
    $this->bookCategoryService->syncBookCategories($book, $request->categories);

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

  public function decodeArrayObjects(Request $request){
    $request->merge([
      'authors' => json_decode($request->authors),
      'categories' => json_decode($request->categories)
    ]);

    return $request;
  }

  public function transform($book){
    return [
      'id' => $book->id,
      'isbn' => $book->isbn,
      'title' => $book->title,
      'description' => $book->description,
      'publisher' => $book->publisher,
      'publicationDate' => date_to_human($book->publication_date),
      'language' => $book->language,
      'price' => $book->price,
      'rating' => $book->rating,
      'sold' => $book->sold,
      'stock' => $book->stock,
      'image' => $this->imageLibraryService->fullPath($book->image),
      'hasOldImage' => $book->image ? $book->image : ''
    ];
  }
}
