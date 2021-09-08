<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User as UserModel;
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
    

    public function userInfo()
    {
        $uId = Auth::id();

        $user = UserModel::where("id", $uId)->first();

        return view('logged.home',  ['user' => $user]);
    }

    public function saveUserInfo(Request $request){
        $uId = Auth::id();
        UserModel::where('id', $uId)->update([
            'email' => $request->input('email'),
            'last_name' => $request->input('last_name'),
            'name' => $request->input('name'),
            'cellphone' => $request->input('cellphone')
        ]);
        return redirect('/home');
    }
}
