<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'id', 'name', 'mobile', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function address() {
        return $this->hasOne('App\Address');
    }

    public function cart() {
        return $this->hasOne('App\Cart');
    }
}
