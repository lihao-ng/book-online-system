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

    public function addresses() {
        return $this->hasMany('App\Address');
    }

    public function books() {
        return $this->belongsToMany('App\Book', 'carts', 'customer_id', 'book_id')->withPivot('amount')->withTimestamps();
    }

    public function sales() {
        return $this->hasMany('App\Sale');
    }

    public function bookRatings() {
        return $this->hasMany('App\Rating');
    }
}
