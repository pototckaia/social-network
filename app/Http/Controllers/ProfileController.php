<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function show($login) {
        $user = User::findByLogin($login);
        if (is_null($user)) {
            return view('404');
        }

        $is_auth = $user->isAuthorized();
        return view('user.profile')
            ->with('user', $user)
            ->with('is_owner', $is_auth);
    }

    public function edit($login) {

    }

}
