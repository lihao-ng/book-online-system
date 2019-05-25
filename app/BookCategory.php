<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $fillable = [
        'id', 'book_id', 'category_id'
    ];

    public function books()
    {
        return $this->hasMany('App\Book');
    }

    public function categories()
    {
        return $this->hasMany('App\Category');
    }
}
