<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
  public function viewRegister(){
    return view('admin.auth.register');
  }

  public function register(Request $request){
    $this->validate($request, [
      "email" => "required|email|unique:users",
      "name" => "required",
      "password" => "required|confirmed"
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'avatar' => null,
      'role' => 1
    ]);
    ;
    Auth::login($user);

    return redirect()->route('admin.dashboard') ;
  }

  public function viewLogin(){
    return view('admin.auth.login');
  }

  public function login(Request $request){
    $this->validate($request, [
      "email" => "required|email",
      "password" => "required"
    ]);

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) {
      return redirect()->route('admin.dashboard');
    }else{
      return redirect()->back()->withErrors(['message' => 'Email or password is incorrect']);
    }
  }

  public function logout(){
    Auth::logout();

    return redirect()->route('admin.login.show');
  }
}
