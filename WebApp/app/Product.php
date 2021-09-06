<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function scopePopular($query)
    {
        return $query->where('votes', '>', 100);
    }


    protected $table = 'Product';

}
