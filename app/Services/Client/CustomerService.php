<?php

namespace App\Services\Client;

use App\Customer;
use App\Address;
use Storage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\Client\AddressService;
use App\Services\Client\CartService;

class CustomerService extends TransformerService {
  protected $addressService;
  protected $cartService;

  public function __construct(AddressService $addressService, CartService $cartService) {
    $this->addressService = $addressService;
    $this->cartService = $cartService;
  }

  public function createAddress(Request $request) {
    return $this->addressService->create($request);
  }

  public function updateMobile(Request $request, Customer $customer){
    $request->validate([
      "mobile" => 'required|string|max:11'
    ]);

    $customer->mobile = $request->mobile;
    $customer->save();

    return $customer->mobile;
  }

  public function updateEmail(Request $request, Customer $customer){
    $request->validate([
      "email" => 'required|email|string'
    ]);

    $user = $customer->user;

    $user->email = $request->email;
    $user->save();

    return $user->email;
  }

  public function updateProfile(Request $request, Customer $customer) {
    $user = $customer->user; 

    $request->validate([
      "email" => "required|email|unique:users,email," . $user->id,
      "name" => "required",
      "addresses" => "required",
      "addresses.*" => "required|distinct",
      "mobile" => "required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10",
      'avatar' => 'nullable|image|max:2000'
    ]);

    $user->email = $request->email;
    $user->save();

    $customer->name = $request->name;
    $customer->mobile = $request->mobile;
    $customer->save();

    $customer->addresses()->delete();

    foreach ($request->addresses as $address) {
      Address::create([
        'address' => $address,
        'customer_id' => $customer->id
      ]);
    }

    if ($request->hasFile('avatar') && $request->file('avatar')->isValid()){
      if($user->avatar) {
        if(avatar_picture_exists($user->avatar)) {
          Storage::delete('/storage/media/' . $user->avatar);
          $fileName = $this->createImage($request->avatar);
        }else {
          $fileName = null;
        }
      }else {
        $fileName = $this->createImage($request->avatar);
      }

      $user->avatar = $fileName;
      $user->save();
    }

    return redirect()->route('home');
  }

  public function createImage($file) {
    $fileName = Carbon::now()->timestamp . '.' . $file->extension(); 
    Storage::disk('public')->putFileAs('media', $file, $fileName);

    return $fileName;
  }

  public function transform($customer){
    return [
      'id' => $customer->id,
      'name' => $customer->name,
      'email' => $customer->user->email,
      'mobile' => $customer->mobile,
      'addresses' => $this->addressService->transformCollection($customer->addresses),
      'books' => $this->cartService->transformCollection($customer->books)
    ];
  }
}
