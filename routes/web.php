<?php

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    // the view() helper method automatically append the `.blade.php`
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact-us');
});

// same uri or endpoint will throw the most recent view/blade file

// 0, 1, 2, 3 ,4, ....
// [1, 2, 3, 5]
$posts = [
    // $posts[0]
    /** 0 */ [
        'id' => 1,
        'title' => 'Post 1',
        'body' => 'This is the body of Post 1.'
    ],

    // $posts[1]
    /** 1 */ [
        'id' => 2,
        'title' => 'Post 2',
        'body' => 'This is the body of Post 2.'
    ],

    // $posts[2]
    /** 2 */ [
        'id' => 3,
        'title' => 'Post 3',
        'body' => 'This is the body of Post 3.'
    ],

    // $posts[3]
    /** 3 */ [
        'id' => 4,
        'title' => 'Post 4',
        'body' => 'This is the body of Post 4.'
    ],
];

/**
 * 0 Post 3
 * 1 Post 3
 */

// in order to use the variables outside of a function implement the `use(...)` keyword then add the variable there
Route::get('/posts', function () use ($posts) {
    // Post::find(id)
    // Post::first()                ---> select * from `posts` limit 1;
    // Post::all()|Post::get()      ---> select * from `posts`
    // Post::all()->last()          ---> fetches all posts then get the last item

    // Get the post with the title of 'Marvel'
    // Post::firstWhere('title', '=', 'Marvel'); or Post::where('title', '=', 'Marvel')->first();

    // Get all the post where title is not 'Marvel'
    // $posts = Post::where('title', '!=', 'Marvel')->get()->pluck('title'); // Post::where('title', '!=', 'Marvel')->pluck('title')

    // Get all the post where id > 1 AND id <= 4

    // dd(now()->subDays(5)->toString());

    // whereDate = filter the posts on a specific date, time is excluded ex: created_at >= 2023-09-09
    // $posts = Post::query()
    //     ->where('id', '>', 1)
    //     ->where('id', '<=', 4)
    //     ->whereDate('created_at', '<=', now()->subDays(6))
    //     ->get()
    //     ->pluck('id');

    return view('posts.posts',[
        'posts' => Post::all()
    ]);
});

// {id} is a wildcard for the post id
Route::get('/post/{id}', function ($id) use ($posts) {

    $filteredPosts = array_filter($posts, function ($post) use ($id) {
        // first item in the array of posts
        // [
        //     'id' => 1,
        //     'title' => 'Post 1',
        //     'body' => 'This is the body of Post 1.'
        // ]

        // If the condition is true for a post, it will be included in the filtered array
        return $post['id'] == $id;
    });

    $index = array_key_first($filteredPosts);

    return view('posts.post', [
        'blogPost' => $filteredPosts[$index]
    ]);
});

Route::get('/db/posts', function () {
    return Post::all();
});

Route::get('/posts/create', function () {
    return view('posts.create');
});

/**
 * Built in methods in the Model that are mostly used
 * 1. Model::first();
 * 2. Model::find(id);
 */

Route::post('/posts', function () {
    $post = Post::create([
        // id, created_at, updated_at
        'title' => request()->title, // request()->all()['title']
        'body'  => request()->body // request()->all()['body']
    ]);

    return redirect('/posts');
});

Route::get('/posts/{id}/edit', function ($id) {
    return view('posts.edit', [
        'post' => Post::find($id),
        'hello' => 'Hello World',
        'name'  => 'Gene'
    ]);
});

Route::put('/posts/{id}', function ($id) {
    // $post = Post::find($id);

    // $post->title = request()->title;
    // $post->body = request()->body;

    // $post->save();

    // dd($post->fresh());

    /**
     UPDATE posts 
        SET
            title = 'TITLE',
            `body` = 'body 1'
        WHERE 
            id = 5;
     */
    Post::where('id', '=', $id)->update([
        'title' => request()->title,
        'body'  => request()->body
    ]);

    return redirect()->back();
});

Route::delete('/posts/{id}', function ($id) {
    Post::where('id', '=', $id)->delete();

    return redirect()->back();
});

// Route http methods
/**
 * 1. Route::get(/posts)
 * 2. Route::post(/posts)
 * 3. Route::put(...)
 */