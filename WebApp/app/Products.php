<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['Especificacao','linksites','img','NomeProduto','Preco','Category_ID','NomeCategoria'];
    protected $table = 'Product';
}
