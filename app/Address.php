<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'id', 'address', 'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
