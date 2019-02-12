<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('authentication');
    }


    public function show() {

        $user_auth = Authentication::user();
        $posts  = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.id_owner')
            ->where('users.id', '=', $user_auth->id)
            ->get();
        return view('home', ['user' => $user_auth, 'posts' => $posts ]);
    }
}


