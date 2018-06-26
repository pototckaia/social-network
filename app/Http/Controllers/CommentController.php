<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index() {
        // GET all
    }

    public function create() {
        // GET
        $comment = new App\Comment(['message' => 'A new comment.']);

        $post = App\Post::find(1);

        $post->comments()->save($comment);

        $post = App\Post::find(1);

        $post->comments()->saveMany([
            new App\Comment(['message' => 'A new comment.']),
            new App\Comment(['message' => 'Another comment.']),
        ]);

        $post = App\Post::find(1);

        $comment = $post->comments()->create([
            'message' => 'A new comment.',
        ]);
    }

    public function store() {
        /// POST
    }

    public function show($id) {
        // GET
    }

    public function edit($id) {

    }

    public function update($id) {
        // PUT/PATCH
    }

    public function destroy($id) {
        // DELETE
    }
}

//    public function index()
//    {
////        $comment = new App\Comment(['message' => 'A new comment.']);
////
////        $post = App\Post::find(1);
////
////        $post->comments()->save($comment);
////
////        $post = App\Post::find(1);
////
////        $post->comments()->saveMany([
////            new App\Comment(['message' => 'A new comment.']),
////            new App\Comment(['message' => 'Another comment.']),
////        ]);
////
////        $post = App\Post::find(1);
////
////        $comment = $post->comments()->create([
////            'message' => 'A new comment.',
////        ]);
//
//        $posts = Auth::user()->posts;
//        return view('.index', compact('events'));
//    }