<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\User;
use Validator;

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

        return view('profile')
            ->with(['user' => $user, 'auth_user' => $auth_user]);
    }

    public function show_auth_user() {
        $user = Authentication::user();
        return view('profile')
            ->with(['user' => $user, 'auth_user' => $user]);
    }

    public function edit() {
        $result = session()->all();
        $token = $result['_token'];


        $user = Authentication::user();
        return view('profile_edit', ['user' => $user, 'token' => $token]);
    }

    private function updateLogin(Request $request) {
        $user = Authentication::user();
        $rules = ['login' =>  'required|string|max:255|unique:users'];
        $validation = Validator::make($request->except('_token'), $rules);
        if ($validation->passes()) {
            $user->login = $request->input('login');
            $user->save();
        }

        return $validation;
    }

    public function update(Request $request) {
        $user = Authentication::user();
        $data = $request->all();

        $valid_login = self::updateLogin($request);
        $valid_about = Validator::make($request->all(), ['about' => 'string|max:255']);
        if ($valid_about->passes()) {
            $user->about = $request->about;
            $user->save();
        }

        $valid_avatar = Validator::make($request->all(), ['avatar' => 'image|max:1000|mimes:jpeg,jpg,png']);
        if ($valid_avatar->passes() && $request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $file = $request->file('avatar');
            $user::saveIvatar($file);
            return $user;
        }

        return back()
            ->with(['user' => Authentication::user()])
            ->withErrors([$valid_login, $valid_avatar, $valid_about])
            ->withInput();

    }

    public function destroy() {
        $user = Authentication::user();
        $user->delete();
        return redirect('welcome');
    }

}
