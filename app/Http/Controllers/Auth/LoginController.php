<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Authentication;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Cookie\CookieJar;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Cookie;

class LoginController extends Controller
{

    const redirectTo = '/';

    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
//        $this->middleware('');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'login' => 'required|string|max:255',
            'password' => 'required|string|min:2',
        ]);
    }

    public function show() {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $credentials = $request;
        $validator = $this->validator($credentials->all());
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findByCredential($credentials->all());
        if (is_null($user)) {
            return back()->withErrors(['general' => 'Wrong login or password']);
        }

        Authentication::regenerate();
        Authentication::setAuthUser($user);

        return redirect()->intended($this::redirectTo);

    }

    public function logout(Request $request) {

        Authentication::regenerate();
        Authentication::forgetAuthUser();

        return redirect($this::redirectTo);
    }
}
