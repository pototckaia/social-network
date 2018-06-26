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

        if (!\App\Http\Controllers\Authentication::isHappen()) {
            return redirect()->route('welcome');
        }

        $response = $next($request);

        \App\Http\Controllers\Authentication::save();
        return $response;
    }
}
