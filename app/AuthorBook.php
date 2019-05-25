<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    protected $fillable = [
        'id', 'author_id', 'book_id'
    ];

    public function books()
    {
        return $this->hasMany('App\Book');
    }

    public function authors()
    {
        return $this->hasMany('App\Author');
    }

}
