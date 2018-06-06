<?php

namespace App\Http\Middleware;

use Closure;

class CheckOwner
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
//        $article = Article::find($request->parameter('id'));
//
//        if ($article->user_id != Auth::user()->id)
//        {
//            // abort
//        }
//
////
//        if ($request->user()->isAuthorized())
//        {
//            return $next($request);
//        }

        $postId = $request->route()->parameter('post');
        if(!Auth::user()->isOwnerPost($postId)) {
            $this->notifyError('You do not have access.');
            return redirect()->route('home');
        }

        return $next($request);
    }
}
