<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'id', 'name', 'description', 'publisher', 'publication_date', 'publication_city', 'language', 'price', 'rating', 'sold', 'stock'
    ];

    public function cartItems()
    {
        return $this->belongsToMany('App\CartItem');
    }

    public function authorBooks()
    {
        return $this->belongsToMany('App\AuthorBook');
    }

    public function bookCategories()
    {
        return $this->belongsToMany('App\CartItem');
    }


}
