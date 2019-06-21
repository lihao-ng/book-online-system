<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model {
  protected $fillable = [
    'user_id', 'code', 'used'
  ];

  public function user() {
    return $this->belongsTo('App\User');
  }
}
