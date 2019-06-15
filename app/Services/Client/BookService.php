<?php

namespace App\Services\Client;

use App\Book;
use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\Client\ImageLibraryService;
use App\Services\Client\AuthorService;
use App\Services\Client\CategoryService;
use App\Services\Client\BookCustomerService;

class BookService extends TransformerService {
  protected $imageLibraryService;
  protected $authorService;
  protected $categoryService;
  protected $bookCustomerService;
  
  function __construct(ImageLibraryService $imageLibraryService, AuthorService $authorService, CategoryService $categoryService, BookCustomerService $bookCustomerService) {
    $this->imageLibraryService = $imageLibraryService;
    $this->authorService = $authorService;
    $this->categoryService = $categoryService;
    $this->bookCustomerService = $bookCustomerService;
  }

  public function search(Request $request){
    if($request->title == "" && $request->category == "" && $request->author == "") {
      $books = Book::all();
    }else {
      $books = Book::where('title', 'like', "%{$request->title}%");

      if($request->author) {
        $books = $books->whereHas('authors', function($author) use ($request) {
          $author->where('name', 'like', "%{$request->author}%");
        });
      }

      if($request->category) {
        $books = $books->whereHas('categories', function($category) use ($request) {
          $category->where('name', 'like', "%{$request->category}%");
        });        
      }

      $books = $books->limit(60)->get();
    }

    return $this->transformCollection($books);
  }

  public function queryAuthors($request) {
    return whereHas('authors', function($author) use ($request) {
      $author->where('name', 'like', "%{$request->author}%");
    });
  }

  public function queryCategories($request) {
    return whereHas('categories', function($category) use ($request) {
      $category->where('name', 'like', "%{$request->category}%");
    });
  }

  public function addCart(Request $request, Book $book) {
    if(!$book->stock) {
      return back()->with('error', 'Sorry, the selected book is currently running low of stocks!');
    }

    return $this->bookCustomerService->addBookToCart($request, $book);
  }

  public function validateStock($items) {
    $bookName = null;

    foreach ($items as $item) {
      $book = $item->book;

      if($item->amount > $book->stock) {
        $bookName = $book->title;
        break;
      }
    }

    return $bookName;
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
