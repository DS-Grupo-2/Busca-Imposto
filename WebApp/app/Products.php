<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['Especificacao','linksites','image','NomeProduto','Preco','Category_ID','NomeCategoria','SubCategoryID'];
    protected $table = 'Product';
}
