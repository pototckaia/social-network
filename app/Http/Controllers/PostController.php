<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        $posts = Auth::user()->posts;
        return view('.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event($request->all());

        Auth::user()->events()->save($event);

        return redirect('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ( $event->id == Auth::user()->id ) {
            return view('events.show', compact('event'));
        }

        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
