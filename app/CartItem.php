<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'id', 'amount', 'cart_id', 'book_id'
    ];

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    public function books()
    {
        return $this->hasMany('App\Book');
    }

    public function sale()
    {
        return $this->hasOne('App\Sale');
    }
}
