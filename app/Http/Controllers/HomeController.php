<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('authentication');
    }


    public function show() {

        $user_auth = Authentication::user();
        return view('home', ['user' => $user_auth]);
    }
}


