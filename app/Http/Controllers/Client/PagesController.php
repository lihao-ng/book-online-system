<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller {
  protected $path = 'client.pages.';

  public function home(){
    return view($this->path . 'home');
  }

   public function catalogues(){
    return view($this->path . 'catalogues');
  }
}
