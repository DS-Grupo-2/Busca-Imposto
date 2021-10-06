<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Products as ProductsModel;

class Home extends Controller
{
    public function index()
    {
        $list = ProductsModel::simplePaginate(15);

        return view('unlogged.home', [
            'list' => $list,
        ]);
    }
}
