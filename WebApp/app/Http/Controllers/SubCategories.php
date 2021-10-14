<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategories as SubCategoriesModel;
use App\Categories as CategoriesModel;
use Illuminate\Support\Facades\Auth;

class SubCategories extends Controller
{

    public function index()
    {
        $list = SubCategoriesModel::simplePaginate(15);

        return view('logged.subcategories.view', [
            'list' => $list,
            'categories' => CategoriesModel::all()
        ]);
    }

    public function create($id = NULL,  Request $request)
    {
        // var_dump($request->input());
        // return;
        if($request->isMethod('post')){
            $uId = Auth::id();
            $categoryId = SubCategoriesModel::create([
                'NomeSubCategoria' => $request->input('NomeSubCategoria'),
                'categoryId' => $request->input('categoryId'),
                'taxPercentage' => $request->input('taxPercentage'),

            ]);
            return redirect('system/subcategories')->with('success','Category created successfuly!');
        }
    }

    public function edit($id= NULL, Request $request)
    {
        // var_dump($request->input());
        // return;
        if($request->isMethod('post')){
            if(SubCategoriesModel::find($id)){
                $subcategoryId = SubCategoriesModel::where('id', $id)->update([
                    'NomeSubCategoria' => $request->input('NomeSubCategoria'),
                    'categoryId' => $request->input('categoryId'),
                    'taxPercentage' => $request->input('taxPercentage'),
                ]);
                return redirect('/system/subcategories')->with('success','SubCategory edited successfuly!');
            }
            else{
                return redirect('/system/subcategories')->with('error','SubCategory not exists!');
            }
        }

        $subcategory = SubCategoriesModel::where("id", $id)->first();
        $list = SubCategoriesModel::simplePaginate(15);

        return view('logged.subcategories.edit', [
            'item' => $subcategory,
            'list' => $list,
            'categories' => CategoriesModel::all()

        ]);
    }

    public function delete($id = NULL)
    {
        if(SubCategoriesModel::find($id)){
            $deletedRows = SubCategoriesModel::destroy($id);
            return redirect('/system/subcategories')->with('warning','SubCategory deleted successfuly!');
        }
        else{
            return redirect('/system/subcategories')->with('error','SubCategory not exists!');
        }
    }
}
