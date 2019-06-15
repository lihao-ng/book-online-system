<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Rating extends Pivot
{
    protected $table = 'ratings';

    protected $fillable = [
        'book_id', 'customer_id', 'star', 'comment'
    ];

    public function books() {
        return $this->belongsTo('App\Book');
    }

    public function customers() {
        return $this->belongsTo('App\Customer');
    }
}
