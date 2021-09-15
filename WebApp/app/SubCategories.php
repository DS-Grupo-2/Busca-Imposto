<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    protected $fillable = ['NomeSubCategoria', 'categoryId'];
    protected $table = 'SubCategory';
}
