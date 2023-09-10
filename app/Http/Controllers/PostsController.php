<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\StoreRequest;
use App\Http\Requests\Posts\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Post; // namespace + \ClassName

class PostsController extends Controller
{
    /**
     * 7 standard controller methods
     * 
     * 1. index --- display all the posts
     * 2. show  --- display specific post
     * 3. create --- display create post page
     * 4. store --- create a post
     * 5. edit --- display edit post page
     * 6. update --- update a post
     * 7. delete --- delete a post
     */

    /**
     * Access Modifiers
     * 1. public
     * 2. private
     * 3. protected
     */

     // object oriented
    public function index(Request $req) // $request = new Request();
    {
        $posts = [];

        // from the url: http://localhost:8000/posts?search=sheesh extract the search parameter
        $search = $req->input('search');

        // if search is not empty
        if (! empty($search)) {
            $posts = Post::where('title', 'LIKE', $search)->get();
        } else {
            $posts = Post::all();
        }

        return view('posts.posts', [
            'posts' => $posts
        ]);
    }

    // public function show(int $id)
    // {
    //     return view('posts.post', [
    //         'post' => Post::findOrFail($id)
    //     ]);
    // }

    // uri: /posts/{post}
    // Route model binding -> Post::findOrFail($id)
    public function show(Post $post)
    {
        return view('posts.post', [
            'post' => $post
        ]);
    }

    public function create(Request $request)
    {
        return view('posts.create');
    }

    public function store(StoreRequest $request)
    {
        // [
        //     'error 1',
        //     'error 2'
        // ],

        // Post::create([
        //     'title' => $request->title,
        //     'body'  => $request->body,
        //     'token' => 'asdasdasd'
        // ]);

        // store
        Post::create($request->all());

        // go to posts page
        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(UpdateRequest $request, Post $post)
    {
        // Post::query()
        //     ->where('id', '=', $id)
        //     ->update([
        //         'title' => request()->title,
        //         'body'  => request()->body
        //     ]);

        $post->update($request->all());

        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        // Post::where('id', '=', $id)->delete();

        $post->delete();

        return redirect()->back();
    }
}
