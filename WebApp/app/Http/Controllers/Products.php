<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products as ProductsModel;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Categories as CategoriesModel;
use App\SubCategories as SubCategoriesModel;
use App\Favorite as FavoriteModel;
use Illuminate\Support\Facades\DB;

class Products extends Controller
{
    public function index(Request $request){
        $list = [];

        if($request->input('search', '')){
            $name = $request->input('search', '');
            $list = ProductsModel::where('NomeProduto', 'like', '%'.$name.'%')->take(5)->get();
        }else if(isset($_GET['orderby']) && $_GET['orderby'] != null && $_GET['orderby'] == 'value' && $request->input('search', '') == ''){
            $list = DB::table('Product')
                ->orderBy('Preco', 'desc')
                ->take(15)
                ->get();
        }else{
            $list = ProductsModel::simplePaginate(15);
        }

        $page['title'] = 'Produtos';
        $search = $request->input('search', '');
        if($search != ''){
            $list = ProductsModel::where('NomeProduto', 'like', '%'.$search.'%')->orderBy('NomeProduto')->get();
        }

        return view('logged.products.view', [
            'list' => $list,
            'categories' => CategoriesModel::all(),
            'subcategories' => SubCategoriesModel::all(),
            'page' => $page,
            'defSearch' => $search
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
        $page['title'] = 'Produtos';

        $search = $request->input('search', '');
        if($search != ''){
            $list = ProductsModel::where('NomeProduto', 'like', '%'.$search.'%')->orderBy('NomeProduto')->get();
        }

        return view('logged\Products\view', [
            'list' => $list,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'page' => $page,
            'defSearch' => $search
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
        $page['title'] = 'Editar produto';


        $search = $request->input('search', '');
        if($search != ''){
            $list = ProductsModel::where('NomeProduto', 'like', '%'.$search.'%')->orderBy('NomeProduto')->get();
        }

        return view('logged.products.edit', [
            'item' => $product,
            'list' => $list,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'page' => $page,
            'defSearch' => $search

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

    public function getMatchedProductsXHR(Request $request){
        $name = $request->input('item', '');
        $list = ProductsModel::where('NomeProduto', 'like', '%'.$name.'%')->take(5)->get();

        echo json_encode($list);
        return;
    }

    // public function get_data(Request $request, $id = NULL){
    //     // return;
    //     $categories = CategoriesModel::all();
    //     if(ProductsModel::find($id)){
    //         $productId = ProductsModel::where('id', $id)->first();
    //         $categoryId = CategoriesModel::where('id', $id)->take(1)->get();
    //         var_dump($productId['Category_ID']);
    //         return;
    //     }
    //     return view('unlogged.test',[
    //         // 'list' => $productId,
    //         // 'item' => $categoryId,
    //     ]);
    // }

    public function getMatchedProducts(Request $request){
        $name = $request->input('search', '');
        $list = ProductsModel::where('NomeProduto', 'like', '%'.$name.'%')->take(5)->get();
        $page['title'] = 'Produtos';


        $search = $request->input('search', '');
        if($search != ''){
            $list = ProductsModel::where('NomeProduto', 'like', '%'.$search.'%')->orderBy('NomeProduto')->get();
        }

        return view('search', [
            'list' => $list,
            'categories' => CategoriesModel::all(),
            'subcategories' => SubCategoriesModel::all(),
            'page' => $page,
            'defSearch' => $search

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


        $search = $request->input('search', '');
        if($search != ''){
            $list = ProductsModel::where('NomeProduto', 'like', '%'.$search.'%')->orderBy('NomeProduto')->get();
        }

        return view('unlogged.test',[
            'list' => $productId,
            'item' => $categoryId,
            'defSearch' => $search

        ]);
    }

    public function getProducts(Request $request){
        //Por categoria
        //Pos subcategoria
        //Por nome dentro de uma categoria e subcategoria
        $list = [];
        $list = ProductsModel::orderBy('NomeCategoria')->get();
        $search = $request->input('search', '');
        $category = $request->input('category', '');
        $subcategory = $request->input('subcategory', '');
        $categoryData = [];
        $subCategoryData = [];

        $list = ProductsModel::orderBy('NomeCategoria')->simplePaginate(9);

        $subcategories  = SubCategoriesModel::orderBy('NomeSubCategoria')->get();

        if($subcategory != '' && $category !=''){
            // $list = ProductsModel::where('NomeCategoria', 'like', '%'.$search.'%')->where('Category_ID', $category)->where('SubCategoryID', $category)->orderBy('NomeCategoria')->simplePaginate(9);
            $list = ProductsModel::where('SubCategoryID', $subcategory)->orderBy('NomeCategoria')->simplePaginate(9);
            $categoryData = CategoriesModel::where('id', $category)->first();
            $subCategoryData = SubCategoriesModel::where('categoryId', $category)->get();
        }
        elseif($category != ''){
            $list = ProductsModel::where('NomeCategoria', 'like', '%'.$search.'%')->orWhere('Category_ID', $category)->orderBy('NomeCategoria')->simplePaginate(9);
            $categoryData = CategoriesModel::where('id', $category)->first();
            $subCategoryData = SubCategoriesModel::where('categoryId', $category)->get();

        }
        elseif($subcategory != ''){
            $list = ProductsModel::where('NomeCategoria', 'like', '%'.$search.'%')->where('Category_ID', $category)->where('SubCategoryID', $category)->orderBy('NomeCategoria')->simplePaginate(9);
            $subCategoryData = SubCategoriesModel::where('categoryId', $category)->get();
        }
        if($search != ''){
            $list = ProductsModel::where('NomeProduto', 'like', '%'.$search.'%')->orderBy('NomeProduto')->simplePaginate(9);
        }
        // $list->get();

        $page['title'] = 'Produtos';


        return view('unlogged.products', [
            'list' => $list,
            'page' => $page,
            'defSearch' => $search,
            'categoryItem' => $category,
            'subcategories' => $subcategories,
            'subcategoryItem' => $subcategory,
            'categoryData' => $categoryData,
            'subCategoryData' => $subCategoryData,

        ]);
    }

    public function getProduct(Request $request, $id = NULL){
        $product  = ProductsModel::where('id',$id)->first();

        $categoryData = CategoriesModel::where('id', $product->Category_ID)->first();
        $subCategoryData = SubCategoriesModel::where('id', $product->SubCategoryID)->first();
        $search = $request->input('search', '');

        $userId = Auth::id();
        $UserFavorite = 0;
        if($userId !== NULL){
            if(FavoriteModel::where('productId', $id)->where('userId', $userId)->first() != NULL){
                $UserFavorite = 1;
            }
        }


        if($search != ''){
            $list = ProductsModel::where('NomeCategoria', 'like', '%'.$search.'%')->orderBy('NomeCategoria')->simplePaginate(9);
        }

        return view('unlogged.productdetails', [
            'item' => $product,
            'categoryData' => $categoryData,
            'subCategoryData' => $subCategoryData,
            'defSearch' => $search,
            'UserFavorite' => $UserFavorite

        ]);
    }

    public function saveProduct(Request $request, $id =NULL){
        $userId = Auth::id();

        if($userId === NULL){
            return redirect('/')->with('error','Product not exists!');
        }
        if(!ProductsModel::find($id)){
            return redirect('/get-products')->with('warning','Product not exists!');
        }

        $product = ProductsModel::where('id', $id)->first();
        $productId = ProductsModel::where('id', $id)->update([
            'likes' => ($product['likes']+1)
        ]);

        $likedId = FavoriteModel::where('productId', $id)->where('userId', $userId)->first();
        if($likedId == NULL){
            $productId = FavoriteModel::create([
                'productId' => $id,
                'userId' => $userId,
            ]);
        }
        else{

            FavoriteModel::destroy($likedId['id']);
            if($product['likes'] >= 0){
                $productId = ProductsModel::where('id', $id)->update([
                    'likes' => ($product['likes']-1)
                ]);
            }
            return redirect('/product'.'/'.$id)->with('success','Product removed with success!');

        }

        return redirect('/product'.'/'.$id)->with('success','Product save with success!');
    }

    public function getSaveds(Request $request){
        $userId = Auth::id();

        if($userId === NULL){
            return redirect('/')->with('error','Product not exists!');
        }
        $list = DB::table('Product')->select('Product.*')->leftJoin('favorite', 'Product.id', '=', 'favorite.productId')->where('userId', $userId)->orderBy('NomeProduto', 'asc')->simplePaginate(15);


        $search = $request->input('search', '');
        if($search != ''){
            $list = ProductsModel::where('NomeProduto', 'like', '%'.$search.'%')->orderBy('NomeProduto')->get();
        }

        return view('logged.favorites.view', [
            'list' => $list,
            'defSearch' => $search,

        ]);
    }

    public function getBests(Request $request){
        $list = ProductsModel::orderBy('likes', "DESC")->orderBy('NomeCategoria')->simplePaginate(12);


        $search = $request->input('search', '');
        if($search != ''){
            $list = ProductsModel::where('NomeProduto', 'like', '%'.$search.'%')->orderBy('NomeProduto')->get();
        }
        return view('logged.bestProds', [
            'list' => $list,
            'defSearch' => $search,
        ]);
    }
}
