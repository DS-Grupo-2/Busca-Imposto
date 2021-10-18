<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products as ProductsModel;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Categories as CategoriesModel;
use App\SubCategories as SubCategoriesModel;
use Illuminate\Support\Facades\DB;

class Products extends Controller
{
    public function index(Request $request){
        $list = [];

        if($request->input('search', '')){
            $name = $request->input('search', '');
            $list = ProductsModel::where('NomeProduto', 'like', '%'.$name.'%')->take(5)->get();
        }else if($_GET['orderby'] != null && $_GET['orderby'] == 'value' && $request->input('search', '') == ''){
            $list = DB::table('Product')
                ->orderBy('Preco', 'desc')
                ->take(15)
                ->get();
        }else{
            $list = ProductsModel::simplePaginate(15);
        }

        return view('logged.products.view', [
            'list' => $list,
            'categories' => CategoriesModel::all(),
            'subcategories' => SubCategoriesModel::all(),
        ]);
    }
    public function create($id = NULL,  Request $request)
    {
        // var_dump($request->input());
        // return;
        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->name;
        $extension = '.'.$request->image->extension();
        $fullName = $newImageName.$extension;
        $request->image->move(public_path('/uploads/product/'), $fullName);


        // $request->image->resize(60, 60, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save(public_path('/uploads/product/').'/'.$newImageName.'-ssm');

        $image = Image::make(public_path('/uploads/product/').$fullName);
        $image->resize(60,60, function($constraint){
             $constraint->aspectRatio();
        })->save(public_path('/uploads/thumbs/').$newImageName.$extension);


        if($request->isMethod('post')){
            $uId = Auth::id();
            $productId = ProductsModel::create([
                'NomeProduto' => $request->input('NomeProduto'),
                'Category_ID' => $request->input('Category_ID'),
                'SubCategoryID' => $request->input('SubCategoryID'),
                'Preco' => $request->input('Preco'),
                'image' => $fullName
            ]);
        }
        $list = ProductsModel::simplePaginate(15);
        $categories = CategoriesModel::all();
        $subcategories = SubCategoriesModel::all();
        return view('logged\Products\view', [
            'list' => $list,
            'categories' => $categories,
            'subcategories' => $subcategories

        ]);



    }


    public function edit($id= NULL, Request $request)
    {
        $post = ProductsModel::where('id',$id)->first();
        $post->image = $request->get('image');


        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $input['image'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/product/');
            $image->move($destinationPath, $input['image']);
            $post->image = $input['image'];
        }
        $post->save();

        if($request->isMethod('post')){
            if(ProductsModel::find($id)){
                $productId = ProductsModel::where('id', $id)->update([
                    'NomeProduto' => $request->input('NomeProduto'),

                ]);
                return redirect('/system/products')->with('success','Product edited successfuly!');
            }
            else{

                return redirect('/system/products')->with('error','Product not exists!');

            }

        }

        $product = ProductsModel::where("id", $id)->first();
        $list = ProductsModel::simplePaginate(15);
        $categories = CategoriesModel::all();
        $subcategories = SubCategoriesModel::all();

        return view('logged.products.edit', [
            'item' => $product,
            'list' => $list,
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }
    public function delete($id = NULL)
    {
        if(ProductsModel::find($id)){
            $deletedRows = ProductsModel::destroy($id);
            return redirect('/system/products')->with('warning','Product deleted successfuly!');
        }
        else{
            return redirect('/system/products')->with('error','Product not exists!');
        }
    }

    /*public function getMatchedProducts(Request $request){
        $name = $request->input('item', '');
        $list = ProductsModel::where('NomeProduto', 'like', '%'.$name.'%')->take(5)->get();

        //echo json_encode($list);

        return view('search', [
            'list' => $list,
            'categories' => CategoriesModel::all(),
            'subcategories' => SubCategoriesModel::all(),
        ]);
        return;
    }*/

    public function getMatchedProducts(Request $request){
        $name = $request->input('search', '');
        $list = ProductsModel::where('NomeProduto', 'like', '%'.$name.'%')->take(5)->get();

        return view('search', [
            'list' => $list,
            'categories' => CategoriesModel::all(),
            'subcategories' => SubCategoriesModel::all(),
        ]);
    }
    
    public function get_data($id = NULL, Request $request){
        $categories = CategoriesModel::all();
        $productId = [];
        $categoryId = [];
        if(ProductsModel::find($id)){
            $productId = ProductsModel::where('id', $id)->first();
            $categoryId = CategoriesModel::where('id', $productId['Category_ID'])->first();   
        }
        return view('unlogged.test',[
            'list' => $productId,
            'item' => $categoryId,
        ]); 
    }
    
}
