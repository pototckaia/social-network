<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('authentication');
    }

    public function store(Request $request, $id_parent = null)
    {
        $data = $request->all();
        $user = Authentication::user();

        $comment = new Comment();
        $comment->content = $data['content'];
        $comment->id_parent = $id_parent;

        $post = Post::find($data['id_post']);
        $post->comments()->save($comment);
        Authentication::user()->comments()->save($comment); // id_comment

        $comment->save();

        return response()
            ->json([
                compact('post'),
            ])
            ->withHeaders([]);
    }

}