<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories as CategoriesModel;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Products as ProductsModel;
use App\Http\Middleware\Authenticate as Authc;


class Categories extends Controller
{
    public function index(Request $request)
    {
        if(!Authc::isAdmin()){
            return  redirect('/home')->with('warning','Action not allowed!');
        }

        $list = CategoriesModel::simplePaginate(15);

        $page['title'] = 'Categorias';

        $search = $request->input('search', '');
        if($search != ''){
            $list = CategoriesModel::where('NomeCategoria', 'like', '%'.$search.'%')->orderBy('NomeCategoria')->get();
        }

        return view('logged.categories.view', [
            'list' => $list,
            'page' => $page,
            'defSearch' => $search

        ]);
    }

    public function create($id = NULL,  Request $request)
    {
        if(!Authc::isAdmin()){
            return  redirect('/home')->with('warning','Action not allowed!');
        }


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
        if(!Authc::isAdmin()){
            return  redirect('/home')->with('warning','Action not allowed!');
        }

        if($request->isMethod('post')){
            $newImageName = $request->input('picture','');

            if(isset($_FILES['picture']['name']) && $_FILES['picture']['name'] != ''){
                $request->validate([
                    'picture' => 'required|mimes:jpg,png,jpeg|max:5048'
                ]);

                $newImageName = time() . '-' . $request->name . '.' .
                $request->picture->extension();
                $request->picture->move(public_path('/uploads/pictures/'), $newImageName);
            }


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
        $page['title'] = 'Editar Categoria';

        $search = $request->input('search', '');
        if($search != ''){
            $list = CategoriesModel::where('NomeCategoria', 'like', '%'.$search.'%')->orderBy('NomeCategoria')->get();
        }

        return view('logged.categories.edit', [
            'item' => $category,
            'list' => $list,
            'page' => $page,
            'defSearch' => $search

        ]);
    }

    public function delete($id = NULL)
    {
        if(Authc::isAdmin());

        if(CategoriesModel::find($id)){
            $deletedRows = CategoriesModel::destroy($id);
            return redirect('/system/categories')->with('warning','Category deleted successfuly!');
        }
        else{
            return redirect('/system/categories')->with('error','Category not exists!');
        }
    }

    public function pag_categorias(Request $request)
    {

        $list = CategoriesModel::orderBy('NomeCategoria')->get();

        $search = $request->input('search', '');
        if($search != ''){
            $list = CategoriesModel::where('NomeCategoria', 'like', '%'.$search.'%')->orderBy('NomeCategoria')->get();
        }


        $page['title'] = 'Categorias';

        return view('unlogged.categories', [
            'list' => $list,
            'page' => $page,
            'defSearch' => $search
        ]);
    }

    public function show(Request $request)
    {

        $list = CategoriesModel::simplePaginate(15);
        $item = ProductsModel::simplePaginate(15);
        $page['title'] = 'Categorias';
        $listProd = ProductsModel::orderBy('likes', "DESC")->orderBy('NomeCategoria')->simplePaginate(12);

        $search = $request->input('search', '');
        if($search != ''){
            $list = CategoriesModel::where('NomeCategoria', 'like', '%'.$search.'%')->orderBy('NomeCategoria')->get();
        }

        return view('unlogged.home', [
            'list' => $list,
            'listProd' => $listProd,
            'item' => $item,
            'page' => $page,
            'defSearch' => $search
        ]);
    }
}
