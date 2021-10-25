<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public static function isAdmin(){
        $uId = Auth::id();
        if($uId != NULL){
            $user = DB::table('users')->where('id', $uId)->first();
            return ($user->level == 1) ? 1 : 0;
        }
        else{
            return route('login');
        }
    }
}
