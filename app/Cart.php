<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{
    protected $table = 'author_categories';

    protected $fillable = [
        'book_id', 'customer_id'
    ];

    public function books() {
        return $this->belongsTo('App\Book');
    }

    public function categories() {
        return $this->belongsTo('App\Category');
    }
}
