<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories as CategoriesModel;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;



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
        $request->validate([
            'picture' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        
        $newImageName = time() . '-' . $request->name . '.' .
        $request->picture->extension();

        $request->picture->move(public_path('/uploads/pictures/'), $newImageName);
        if($request->isMethod('post')){
            $uId = Auth::id();
            $categoryId = CategoriesModel::create([
                'NomeCategoria' => $request->input('NomeCategoria'),
                'taxPercentage' => $request->input('taxPercentage'),
                'picture' => $newImageName,
            ]);
            return redirect('system/categories')->with('success','Category created successfuly!');
        }
    }

    public function edit($id= NULL, Request $request)
    {   
      
        if($request->isMethod('post')){
            $request->validate([
                'picture' => 'required|mimes:jpg,png,jpeg|max:5048'
            ]);
            
            $newImageName = time() . '-' . $request->name . '.' .
            $request->picture->extension();
            $request->picture->move(public_path('/uploads/pictures/'), $newImageName);
            if(CategoriesModel::find($id)){
                $categoryId = CategoriesModel::where('id', $id)->update([
                    'NomeCategoria' => $request->input('NomeCategoria'),
                    'taxPercentage' => $request->input('taxPercentage'),
                    'picture' => $newImageName,
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

    public function pag_categorias()
    {
        $list = CategoriesModel::simplePaginate(15);

        return view('categories', [
            'list' => $list,
        ]);
    }
}
