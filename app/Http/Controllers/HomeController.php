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
        $user = session()->get('user');
        return view('user_home', ['user' => $user]);
    }

//    public function destroy($id) {
//        $user = User::find($id);
//        $user->delete();
//        return back();
//    }
//
//    public function edit($id) {
//        $user = User::find($id);
//        return view('home.edit', ['user' => $user]);
//    }
//    public function update(Request $request, $id) {
//        $user = User::find($id);
//        $user->update($request->all());
//        $user->save();
//        return back();
//    }
}
