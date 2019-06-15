<?php

namespace App\Http\Controllers\Client;

use App\User;
use App\Customer;
use App\Address;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
  protected $path = 'client.auth.';

  public function showRegister(){
    return view($this->path . 'register');
  }

  public function register(Request $request){
    $this->validate($request, [
      "email" => "required|email|unique:users",
      "name" => "required",
      "addresses" => "required",
      "addresses.*" => "required|distinct",
      "mobile" => "required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10",
      "password" => "required|confirmed",
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'avatar' => null,
      'role' => 0
    ]);

    $customer = Customer::create([
      'name' => $request->name,
      'mobile' => $request->mobile,
      'user_id' => $user->id
    ]);

    foreach ($request->addresses as $address) {
      Address::create([
        'address' => $address,
        'customer_id' => $customer->id
      ]);
    }
    
    Auth::login($user);

    return redirect()->route('home');
  }

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

  public function logout(){
    Auth::logout();

    return redirect()->route('home');
  }
}
