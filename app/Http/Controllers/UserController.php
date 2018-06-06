<?php


namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('log')->only('index');

        $this->middleware('subscribed')->except('store');

        $this->middleware(CheckAge::class);

        $this->middleware('authorize', ['only' => ['edit'], ['delete']]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile',compact('user',$user));
    }


    public function update_avatar(Request $request){
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = Auth::user();
        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('avatars',$avatarName);
        $user->avatar = $avatarName;
        $user->save();
        return back()
            ->with('success','You have successfully upload image.');
    }
}
