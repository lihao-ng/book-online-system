<?php

use App\User;
use Carbon\Carbon;


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