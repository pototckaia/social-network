<?php

namespace App\Http\Controllers\Auth;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Support\Facades\Auth as Auth;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Cookie\CookieJar;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Cookie;

class LoginController extends Controller
{

    const redirectTo = '/home';

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

        session()->regenerate();
        $id_session =  session()->getId();
        session()->put('user', $user);

        Cookie::queue(Cookie::make('id_session', $id_session));

        return redirect()->intended($this::redirectTo);

    }

    public function logout(Request $request) {

        session()->regenerate();
        session()->pull('user');
        session()->forget('user');

        Cookie::queue(Cookie::forget('id_session'));

        return redirect()->intended($this::redirectTo);
    }
}
