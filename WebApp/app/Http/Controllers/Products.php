<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products as ProductsModel;
use Illuminate\Support\Facades\Auth;

class Products extends Controller
{
    public function index(){
        // return view('logged.products.edit', [
        // ]);
    }
    public function create($id = NULL,  Request $request){
    }

    public function edit($id= NULL, Request $request){
    }
    public function delete($id = NULL){
    }
}
