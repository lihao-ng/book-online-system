<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'id', 'name'
    ];

    public function authorBooks()
    {
        return $this->belongsToMany('App\AuthorBook');
    }

}
