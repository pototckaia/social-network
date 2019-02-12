<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('authentication')->except('show');
    }

    public function show($login) {
        $user = User::findByLogin($login);
        if (is_null($user)) {
            return view('404');
        }
        $auth_user = Authentication::user();
        $count = DB::table('posts')
            ->select(DB::raw('count(posts.id_owner) as post_counts'))
            ->join('users', 'users.id', '=', 'posts.id_owner')
            ->where('users.id', '=', $user->id)
            ->get();

        return view('profile')
            ->with(['user' => $user, 'auth_user' => $auth_user, 'count' => $count[0]->post_counts]);
    }

    public function show_auth_user() {
        $user = Authentication::user();
        $count = DB::table('posts')
            ->select(DB::raw('count(posts.id_owner) as post_counts'))
            ->join('users', 'users.id', '=', 'posts.id_owner')
            ->where('users.id', '=', $user->id)
            ->get();

        return view('profile')
            ->with(['user' => $user, 'auth_user' => $user, 'count' => $count[0]->post_counts]);
    }

    public function edit() {
        $user = Authentication::user();
        return view('profile_edit', ['user' => $user]);
    }

    private function updateLogin($login) {
        $user = Authentication::user();
        $rules = ['login' =>  'required|string|max:255|unique:users'];
        $validation = Validator::make([$login], $rules);
        if ($validation->passes()) {
            $user->login = $login;
            $user->save();
        }

        return $validation;
    }

    private function updateEmail($email) {
        $user = Authentication::user();
        $rules = ['email' =>  'email'];
        $validation = Validator::make([$email], $rules);
        if ($validation->passes()) {
            $user->email = $email;
            $user->save();
        }

        return $validation;
    }

    public function update(Request $request) {
        $user = Authentication::user();

        $valid_login = self::updateLogin($request->input('login'));
        $valid_email = self::updateEmail($request->input('email'));

        $valid_about = Validator::make($request->all(), ['about' => 'string|max:255']);
        if ($valid_about->passes()) {
            $user->about = $request->about;
            $user->save();
        }

        $valid_avatar = Validator::make($request->all(), ['avatar' => 'image|max:1000|mimes:jpeg,jpg,png']);
        if ($valid_avatar->passes() && $request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $file = $request->file('avatar');
            $user->saveAvatar($file);
        }

        return back()
            ->with(['user' => Authentication::user()])
            ->withErrors([$valid_login, $valid_avatar, $valid_about, $valid_email])
            ->withInput();

    }

    public function destroy() {
        $user = Authentication::user();
        Authentication::logout();

        $user->delete();
        return redirect()->route('welcome');
    }

}
