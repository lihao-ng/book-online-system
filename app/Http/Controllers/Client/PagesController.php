<?php

namespace App\Http\Controllers\Client;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
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

  public function forgetPassword(){
    return view($this->path . 'forgetPassword');
  }

  public function requestPassword(){
    return view($this->path . 'requestPassword');
  }


  public function sendContactUs(Request $request){
    $admin = 'nglihao98@gmail.com';

    $this->validate($request, [
      "name" => "required",
      "email" => "required|email",
      "customerMessage" => "required"
    ]);

    Mail::to($admin)->send(new ContactUs($request->name, $request->email, $request->customerMessage));

    return view($this->path . 'contact');
  }
}
