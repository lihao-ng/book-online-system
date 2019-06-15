<?php

namespace App\Http\Controllers\Client;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Client\BookService;

class PagesController extends Controller {
  protected $path = 'client.pages.';
  protected $bookService;

  function __construct(BookService $bookService) {
    $this->bookService = $bookService;
  }

  public function home(){
    $ratingBooks = $this->bookService->transformCollection(Book::orderBy('rating', 'DESC')->limit(4)->get());
    $soldBooks = $this->bookService->transformCollection(Book::orderBy('sold', 'DESC')->limit(4)->get());
    $latestBooks = $this->bookService->transformCollection(Book::orderBy('created_at', 'DESC')->limit(4)->get());

    return view($this->path . 'home', ['ratingBooks' => $ratingBooks, 'soldBooks' => $soldBooks, 'latestBooks' => $latestBooks]);
  }

  public function contactUs(){
    return view($this->path . 'contact');
  }

  public function customerRegister(){
    return view($this->path . 'customerRegister');
  }

  public function editProfile(){
    return view($this->path . 'editProfile');
  }
}
