<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products as ProductsModel;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Categories as CategoriesModel;
use App\SubCategories as SubCategoriesModel;



class Products extends Controller
{
    public function index(){
        $list = ProductsModel::simplePaginate(15);

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
        
        $newImageName = time() . '-' . $request->name . '.' .
        $request->image->extension();
        $request->image->move(public_path('/uploads/product/'), $newImageName);


        if($request->isMethod('post')){
            $uId = Auth::id();
            $productId = ProductsModel::create([
                'NomeProduto' => $request->input('NomeProduto'),
                'Category_ID' => $request->input('Category_ID'),
                'SubCategoryID' => $request->input('SubCategoryID'),
                'Preco' => $request->input('Preco'),
                'image' => $newImageName
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

    
}
