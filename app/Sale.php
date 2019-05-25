<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'id', 'cart_item_id', 'price'
    ];

    public function cartItem()
    {
        return $this->belongsTo('App\CartItem');
    }
}
