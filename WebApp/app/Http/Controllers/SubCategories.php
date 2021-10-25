<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategories as SubCategoriesModel;
use App\Categories as CategoriesModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate as Authc;

class SubCategories extends Controller
{

    public function index(Request $request)
    {
        if(!Authc::isAdmin()){
            return redirect('/home')->with('warning','Action not allowed!');
        }


        $list = SubCategoriesModel::simplePaginate(15);
        $page['title'] = 'Subcategorias';



        $search = $request->input('search', '');
        if($search != ''){
            $list = SubCategoriesModel::where('NomeSubCategoria', 'like', '%'.$search.'%')->orderBy('NomeSubCategoria')->get();
        }

        return view('logged.subcategories.view', [
            'page' => $page,
            'list' => $list,
            'categories' => CategoriesModel::all(),
            'defSearch' => $search

        ]);
    }

    public function create($id = NULL,  Request $request)
    {
        if(!Authc::isAdmin()){
            return redirect('/home')->with('warning','Action not allowed!');
        }


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
        if(!Authc::isAdmin()){
            return redirect('/home')->with('warning','Action not allowed!');
        }


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
        $page['title'] = 'Editar Subcategoria';

        $search = $request->input('search', '');
        if($search != ''){
            $list = SubCategoriesModel::where('NomeSubCategoria', 'like', '%'.$search.'%')->orderBy('NomeSubCategoria')->get();
        }

        return view('logged.subcategories.edit', [
            'item' => $subcategory,
            'list' => $list,
            'categories' => CategoriesModel::all(),
            'page' => $page,
            'defSearch' => $search

        ]);
    }

    public function delete($id = NULL)
    {
        if(!Authc::isAdmin()){
            return redirect('/home')->with('warning','Action not allowed!');
        }


        if(SubCategoriesModel::find($id)){
            $deletedRows = SubCategoriesModel::destroy($id);
            return redirect('/system/subcategories')->with('warning','SubCategory deleted successfuly!');
        }
        else{
            return redirect('/system/subcategories')->with('error','SubCategory not exists!');
        }
    }

    public function pagSubcategories(Request $request, $id = NULL){

        if(!CategoriesModel::find($id)){
            return redirect('/categories')->with('warning','Esta categoria não está cadastrada no sistema existe');
        }

        $category = CategoriesModel::where('id', $id)->orderBy('NomeSubCategoria')->first();
        $list = SubCategoriesModel::where('categoryId', $id)->orderBy('NomeSubCategoria')->get();
        $search = $request->input('search', '');
        if($search != ''){
            $list = SubCategoriesModel::where('categoryId', $id)->where('NomeSubCategoria', 'like', '%'.$search.'%')->orderBy('NomeSubCategoria')->get();
        }


        $page['title'] = 'Categorias';

        return view('unlogged.subcategories', [
            'list' => $list,
            'category' => $category,
            'page' => $page,
            'defSearch' => $search
        ]);
    }
}
