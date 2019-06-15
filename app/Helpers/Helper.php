<?php

use App\User;
use Carbon\Carbon;

function have_admin() {
  $admin = User::where('role', 1)->count();

  if($admin > 0) {
    return false;
  }

  return true;
}

function current_user(){
  return Auth::user();
}

function is_active($path, $class = 'active'){
  return Request::is('*' . $path . '*') ? 'active' :  '';
}

function date_to_human($date, $format = 'd/m/Y, h:i A'){
  if ($date == null) {
    return '';
  }

  $dt = Carbon::parse($date);
  return $dt->format($format);
}

function directory_path($option = ''){
  return 'public/' . $option . '/';
}

function avatar_picture_url($url){
  if($url) {
    return env('APP_URL') . '/storage/media/' . $url;
  }

  return env('APP_URL') . '/images/logo.jpg';
}

function avatar_picture_exists($url){
  if ($url == '' || $url == null) {
    return false;
  }

  if(Storage::exists('/public/media/' . $url) ) {
    return true;
  }else{
    return false;
  }
}
