<?php

namespace App\Http\Controllers\Auth;

use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;


class RegisterController extends Controller
{
//    use RegistersUsers;

    const redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');
    }

    /**
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'login' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:2|confirmed',
//            'image' => 'image|mimes:jpeg,png,bmp,gif,svg|max:100'
        ]);
    }

    /**
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'login' => $data['login'],
            'password' => Hash::make($data['password']),
            'path_to_avatar' => null,
            'about' => null,

        ]);
    }

    public function register(Request $request) {

        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $user = $this->create($request->all());

        $session_id =  session()->getId();
        session()->put('user', $user);

        Cookie::queue('session_id', $session_id);


        return redirect($this::redirectTo);
    }

    public function show(){
        return view('auth/register');
    }
}
