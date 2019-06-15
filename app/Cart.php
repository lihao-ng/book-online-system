<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{
    protected $table = 'carts';

    protected $fillable = [
        'book_id', 'customer_id', 'amount'
    ];

    public function book() {
        return $this->belongsTo('App\Book');
    }

    public function customer() {
        return $this->belongsTo('App\Customer');
    }
}
