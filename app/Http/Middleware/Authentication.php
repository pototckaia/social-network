<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id_session =  session()->getId();
        $id_cookie = $request->cookie('id_session');

        session()->regenerate();
        $new_id = session()->getId();

        Cookie::queue(Cookie::make('id_session', $new_id));

        if ($id_cookie !== $id_session) {
            return redirect()->route('welcome');
        }

        return $next($request);
    }
}
