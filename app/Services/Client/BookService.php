<?php

namespace App\Services\Client;

use App\Book;
use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\Client\ImageLibraryService;
use App\Services\Client\AuthorService;
use App\Services\Client\CategoryService;

class BookService extends TransformerService {
  protected $imageLibraryService;
  protected $authorService;
  protected $categoryService;
  
  function __construct(ImageLibraryService $imageLibraryService, AuthorService $authorService, CategoryService $categoryService) {
    $this->imageLibraryService = $imageLibraryService;
    $this->authorService = $authorService;
    $this->categoryService = $categoryService;
  }

  public function search(Request $request){
    if($request->title == "" && $request->category == "" && $request->author == "") {
      $books = Book::all();
    }else {
      $books = Book::where('title', 'like', "%{$request->title}%")->whereHas('authors', function($author) use ($request) {
        $author->where('name', 'like', "%{$request->author}%");
      })->whereHas('categories', function($category) use ($request) {
        $category->where('name', 'like', "%{$request->category}%");
      })->limit(60)->get();
    }

    return $this->transformCollection($books);
  }

  public function transform($book){
    return [
      'id' => $book->id,
      'isbn' => $book->isbn,
      'title' => $book->title,
      'description' => $book->description,
      'publisher' => $book->publisher,
      'publicationDate' => date_to_human($book->publication_date, 'F Y'),
      'language' => $book->language,
      'price' => $book->price,
      'rating' => $book->rating,
      'sold' => $book->sold,
      'stock' => $book->stock,
      'image' => $this->imageLibraryService->fullPath($book->image),
      'authors' => $this->authorService->transformCollection($book->authors),
      'categories' => $this->categoryService->transformCollection($book->categories)
    ];
  }
}
