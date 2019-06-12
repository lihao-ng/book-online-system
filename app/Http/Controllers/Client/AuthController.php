<?php

namespace App\Http\Controllers\Client;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
  protected $path = 'client.auth.';

  public function showLogin(){
    return view($this->path . 'login');
  }

  public function login(Request $request){
    $this->validate($request, [
      "email" => "required|email",
      "password" => "required"
    ]);

    if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 0])) {
      return redirect()->route('home');
    }else{
      return redirect()->back()->withErrors(['message' => 'Email or password is incorrect']);
    }
  }
}
