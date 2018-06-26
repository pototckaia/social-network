<?php

namespace App\Http\Controllers;

use App\User;
use Cookie;

class Authentication extends Controller
{
    static function isHappen() {
        $id_session =  session()->getId();
        $id_cookie = Cookie::get('id_session');;
            return $id_session === $id_cookie;
    }

    static function user() {
        $user = null;
        if (self::isHappen()) {
            $user_id = session()->get('id_user');
            $user = User::find($user_id);
        }

        return $user;
    }

    static public function isAuthorized($user)
    {
        return session()->get('id_user') == $user->id;
    }

    static function save() {
        Cookie::queue(Cookie::make('id_session', session()->getId()));
    }

    static public function regenerate() {
        session()->regenerate();
        $new_id = session()->getId();
        session()->save();

        Cookie::queue(Cookie::make('id_session', $new_id));
    }

    static public function setAuthUser(User $user) {
        $session_id =  session()->getId();
        session()->put('id_user', $user->id);
        session()->save();

        Cookie::queue('id_session', $session_id);
    }

    static function forgetAuthUser() {
        session()->pull('id_user');
        session()->forget('id_user');
        session()->save();

        Cookie::queue(Cookie::forget('id_session'));
    }

}
