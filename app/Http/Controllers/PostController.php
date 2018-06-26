<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('authentication')->except('show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create post";
        $route_name  = 'post.store';
        $method = 'post';
        return view('post_operation', ['title' => $title, 'route_name' => $route_name, 'method' => $method]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $post = new Post();

        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->comments_enable = $request->has('comments_enable');
        $post->save();
        Authentication::user()->posts()->save($post);

        return route('post.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $is_owner = (Authentication::isHappen() && $post->id_owner == Authentication::user()->id);
        $owner = User::find($post->id_owner);

        $comments = $post->comments();

        return view('post_show', [
            'post' => $post,
            'owner' => $owner,
            'all_comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $title = "Edit post";
        $route_name  = 'post.update';
        $method = 'put';
        $edit = true;
        return view('post_operation', ['title' => $title, 'route_name' => $route_name,
            'method' => $method, 'edit' => $edit, 'post' => $post]);
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
        $data = $request->all();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->comments_enable = $request->has('comments_enable');
        $post->save();
        Authentication::user()->posts()->save($post);

        return route('post.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return route('me');
    }
}
