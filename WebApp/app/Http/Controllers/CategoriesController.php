<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Image;
use App\Categories as CategoriesModel;

class CategoriesController extends Controller
{
    //
    

    public function update_picture(Request $request){
        if($request->hasFile('picture')){
            $picture = $request->file('picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(300, 300)->save( public_path('/uploads/pictures/' . $filename));
            $id = $request->input('idCategoria');
            if(CategoriesModel::find($id)){
                $categoryId = CategoriesModel::where('id', $id)->update([
                    'picture' => $filename,
                    
                ]);
                return redirect('/system/categories')->with('success','Category edited successfuly!');
            }
            else{
                return redirect('/system/categories')->with('error','Category not exists!');
            }

        }
   }
}