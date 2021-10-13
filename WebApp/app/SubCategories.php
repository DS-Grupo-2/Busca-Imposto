<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    protected $fillable = ['NomeSubCategoria', 'categoryId', 'taxPercentage'];
    protected $table = 'SubCategory';
}
