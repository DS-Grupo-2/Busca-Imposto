<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories as CategoriesModel;
use Illuminate\Support\Facades\Auth;


class Categories extends Controller
{
    public function index()
    {
        $list = CategoriesModel::simplePaginate(15);

        return view('logged.categories.view', [
            'list' => $list,
        ]);
    }

    public function create($id = NULL,  Request $request)
    {
        if($request->isMethod('post')){
            $uId = Auth::id();
            $categoryId = CategoriesModel::create([
                'NomeCategoria' => $request->input('NomeCategoria'),
            ]);
            return redirect('system/categories')->with('success','Category created successfuly!');
        }
    }

    public function edit($id= NULL, Request $request)
    {
        if($request->isMethod('post')){
            if(CategoriesModel::find($id)){
                $categoryId = CategoriesModel::where('id', $id)->update([
                    'NomeCategoria' => $request->input('NomeCategoria'),
                ]);
                return redirect('/system/categories')->with('success','Category edited successfuly!');
            }
            else{
                return redirect('/system/categories')->with('error','Category not exists!');
            }
        }

        $category = CategoriesModel::where("id", $id)->first();
        $list = CategoriesModel::simplePaginate(15);

        return view('logged.categories.edit', [
            'item' => $category,
            'list' => $list
        ]);
    }

    public function delete($id = NULL)
    {
        if(CategoriesModel::find($id)){
            $deletedRows = CategoriesModel::destroy($id);
            return redirect('/system/categories')->with('warning','Category deleted successfuly!');
        }
        else{
            return redirect('/system/categories')->with('error','Category not exists!');
        }
    }
}
