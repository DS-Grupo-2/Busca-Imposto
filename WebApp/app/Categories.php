<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['NomeCategoria', 'picture', 'taxPercentage'];
    protected $table = 'Category';
}
