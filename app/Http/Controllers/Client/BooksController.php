<?php

namespace App\Http\Controllers\Client;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Client\BookService;

class BooksController extends Controller {
  protected $path = 'client.books.';
  protected $bookService;

  public function __construct(BookService $bookService) {
    $this->bookService = $bookService;
  }

  public function index(Request $request) {
    $ratingBooks = $this->bookService->transformCollection(Book::orderBy('rating', 'DESC')->limit(5)->get());
    $bestsellerBooks = $this->bookService->transformCollection(Book::orderBy('sold', 'DESC')->limit(5)->get());

    return view($this->path . 'index', ['ratingBooks' => $ratingBooks, 'bestsellerBooks' => $bestsellerBooks]);
  }

  public function show(Request $request, Book $book) {
    $randomBooks = $this->bookService->transformCollection(Book::where('id', '!=', $book->id)->get()->random(4));
    $relatedBooks = $this->getRelatedBooks($book);
    $book = $this->bookService->transform($book);

    return view($this->path . 'show', ['book' => $book, 'randomBooks' => $randomBooks, 'relatedBooks' => $relatedBooks]);
  }

  public function getRelatedBooks($book) {
    $categories = $book->categories;

    if($categories->isEmpty()) {
      return;
    }

    $relatedCategory = $categories->first();

    return $this->bookService->transformCollection(Book::where('id', '!=', $book->id)->whereHas('categories', function($category) use ($relatedCategory) {
      $category->where('name', $relatedCategory->name);
    })->limit(4)->get()); 
  }

  public function search(Request $request) {
    return $this->bookService->search($request);
  }

  public function addCart(Request $request, Book $book) {
    return $this->bookService->addCart($request, $book);
  }
}
