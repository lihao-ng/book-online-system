<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller {
  protected $path = 'client.pages.';

  public function home(){
    return view($this->path . 'home');
  }

  public function cartPage(){
    return view($this->path . 'cartPage');
  }

  public function contactUs(){
    return view($this->path . 'contactUs');
  }
}
