<?php

namespace App\Services\Client;

use App\Book;
use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\Client\ImageLibraryBookService;

class BookService extends TransformerService {
  function __construct(ImageLibraryService $imageLibraryService) {
    $this->imageLibraryService = $imageLibraryService;
  }

  public function search(Request $request){
    $books = Book::where('title', 'like', "%{$request->title}%")->whereHas('authors', function($author) use ($request) {
      $author->where('name', 'like', "%{$request->author}%");
    })->whereHas('categories', function($category) use ($request) {
      $category->where('name', 'like', "%{$request->category}%");
    })->limit(20)->get();

    return $this->transformCollection($books);
  }

  public function getBook(Request $request) {
    $request->validate([
      'id' => 'required|numeric',
    ]);

    $book = Book::find($request->id);

    // return route to single product
    // return route()
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
      'image' => $this->imageLibraryService->fullPath($book->image)
    ];
  }
}
