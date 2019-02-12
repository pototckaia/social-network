<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('authentication');
    }

    public function create()
    {
        return view('post_create')
            ->with(['method' => 'post', 'route_name' => 'post.store']);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user = Authentication::user();

        $post = new Post();
        $post->title = $data['title'];
        $post->content = isset($data['content']) ? $data['content'] : '';
//        $post->comments_enable = $request->has('comments_enable');
        Authentication::user()->posts()->save($post);
        $post->save();
        return back();

//        return response()
//            ->json([
//                compact('post'),
//            ])
//            ->withHeaders([]);
    }
}
