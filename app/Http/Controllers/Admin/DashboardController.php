<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Sale;
use App\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {
  protected $path = 'admin.dashboard.';

  public function dashboard() {
    // $sales = Sale
    $admins = User::where('role', 1)->count();
    $customers = User::where('role', 0)->count();
    $books = Book::orderBy('sold', 'DESC')->limit(5)->get();

    return view($this->path . 'index', ['admins' => $admins, 'customers' => $customers, 'books' => $books]);
  }
}
