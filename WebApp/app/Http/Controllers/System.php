<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class System extends Controller
{
    public function index()
    {
        return view('logged.home', []);
    }
}
