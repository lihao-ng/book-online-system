<?php

namespace App\Http\Controllers\Client;

use Auth;
use App\User;
use App\Customer;
use App\Address;
use App\PasswordReset;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;
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

  public function showRequestEmail(){
    return view($this->path . 'request-email');
  }

  public function requestEmail(Request $request){
    $this->validate($request, [
      "email" => "required|email"
    ]);

    $userExist = User::where('email', $request->email)->where('role', 0)->first();

    if(!$userExist) {
      return back()->with('error', 'Unable to find email in our database');
    }

    $passwordReset = PasswordReset::create([
      'user_id' => $userExist->id,
      'code' => md5(str_random(30) . time())
    ]);

    $codeUrl = env('APP_URL') . '/request-password/' . $passwordReset->code;

    Mail::to($userExist->email)->send(new PasswordResetMail($userExist->email, $codeUrl));

    return redirect()->route('customer.login.show')->with('success', 'Success! An e-mail has been sent to your email. Please verify from it!');
  }

  public function showRequestPassword($code){
    $passwordResetExist = PasswordReset::where('code', $code)->where('used', 0)->first();

    if(!$passwordResetExist) {
      return redirect()->route('customer.login.show')->with('error', 'Code is invalid');
    }

    return view($this->path . 'request-password', ['code' => $code]);
  }

  public function requestPassword(Request $request, $code){
    $this->validate($request, [
      "password" => "required|confirmed"
    ]);

    $passwordReset = PasswordReset::where('code', $code)->where('used', 0)->first();
    $user = $passwordReset->user;

    $user->password = Hash::make($request->password);
    $user->save();

    $passwordReset->used = 1;
    $passwordReset->save();

    return redirect()->route('customer.login.show')->with('success', 'Password has been reset!');
  }
}
