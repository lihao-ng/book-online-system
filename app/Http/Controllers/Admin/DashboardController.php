<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Sale;
use App\Book;
use Storage;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller {
  protected $path = 'admin.dashboard.';

  public function dashboard() {
    // $sales = Sale
    $admins = User::where('role', 1)->count();
    $customers = User::where('role', 0)->count();
    $books = Book::orderBy('sold', 'DESC')->limit(5)->get();

    return view($this->path . 'index', ['admins' => $admins, 'customers' => $customers, 'books' => $books]);
  }

  public function viewProfile() {
    return view('admin.editProfile.edit-profile');
  }

  public function updateProfile(Request $request) {
    $this->validate($request, array(
      'name' => 'required|string|max:191',
      'avatar' => 'nullable|image|max:2000'
    ));

    $admin = current_user();

    if ($request->hasFile('avatar') && $request->file('avatar')->isValid()){
      if($admin->avatar) {
        if(avatar_picture_exists($admin->avatar)) {
          Storage::delete('/storage/media/' . $admin->avatar);
          $fileName = $this->createImage($request->avatar);
        }else {
          $fileName = null;
        }
      }else {
        $fileName = $this->createImage($request->avatar);
      }

      $admin->avatar = $fileName;
    }

    $admin->name = $request->name;
    $admin->save();

    return redirect()->back()->with("success", "Account Has Been Updated Successfully!");
  }

  public function createImage($file) {
    $fileName = Carbon::now()->timestamp . '.' . $file->extension(); 
    Storage::disk('public')->putFileAs('media', $file, $fileName);

    return $fileName;
  }

  public function updatePassword(Request $request){
    $admin = current_user();

    if (!(Hash::check($request->get('current_password'), $admin->password))) {
        // The passwords do not match
      return redirect()->back()->with("error", "Your current password does not match with the password you provided. Please try again.");
    }

    if(strcmp($request->get('current_password'), $request->get('password')) == 0){
        //Current password and new password are same
      return redirect()->back()->with("error", "New password cannot be the same as your current password. Please choose a different password.");
    }


    $validator = Validator::make($request->all(), [
      'current_password' => 'required',
      'password' => 'required|min:6|confirmed',
    ]);

    if ($validator->fails()) {
      return redirect()->back()->with("error", "Password is not valid. Please ensure that it has a minimum of 6 characters and that the password and password confirmation matches.");
    }

    //Change Password
    $admin->password = bcrypt($request->get('password'));
    $admin->save();

    return redirect()->back()->with("success", "Password changed successfully!");
  }
}
