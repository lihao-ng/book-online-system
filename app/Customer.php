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

    public function books() {
        return $this->belongsToMany('App\Book', 'carts', 'customer_id', 'book_id')->withTimestamps();
    }

    public function bookRatings() {
        return $this->hasMany('App\Rating');
    }
}
