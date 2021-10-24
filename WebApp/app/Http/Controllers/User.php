<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User as UserModel;
use App\Categories as CategoriesModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use League\MimeTypeDetection\FinfoMimeTypeDetector;

class User extends Controller
{

    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */


    public function userInfo(Request $request)
    {
        $uId = Auth::id();
        $user = UserModel::where("id", $uId)->first();

        $search = $request->input('search', '');
        if($search != ''){
            $list = CategoriesModel::where('NomeCategoria', 'like', '%'.$search.'%')->orderBy('NomeCategoria')->get();
        }

        $page['title'] = 'Informações';

        return view('logged.home',  ['user' => $user, 'page' => $page,             'defSearch' => $search
    ]);
    }

    public function saveUserInfo(Request $request)
    {
        $uId = Auth::id();
        UserModel::where('id', $uId)->update([
            'email' => $request->input('email'),
            'last_name' => $request->input('last_name'),
            'name' => $request->input('name'),
            'cellphone' => $request->input('cellphone')
        ]);
        return redirect('/home');
    }

    public function delete()
    {
        $user = UserModel::find(Auth::user()->id);
        Auth::logout();
        if ($user->delete()) {
             return redirect('home')->with('global', 'Your account has been deleted!');
        }
    }
}
