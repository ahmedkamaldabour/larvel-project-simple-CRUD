<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPosts = Post::all();
        // convert to array to object
        // first convert the array to json then convert to object
        //$allPosts = json_decode(json_encode($allPosts), FALSE);
        //	dd($allPosts);
        //return view('test', compact('allPosts'));
        return view('posts/index', ['posts' => $allPosts]);
    }

    /*
     * Show the form for existing resource.
     */
    public function show(Post $post)
    {
//		$singlePost = Post::findOrFail($post);
//		$singlePost = Post::where('id', $post)->firstOrFail();
        //using route model binding
        return view('posts.show', ['post' => $post]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // get all users
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store()
    {
//		$title = request()->title;
//		$description = request()->description;
        $data = request()->all();
//		$post = Post::create(
//			[
//				'title' => $data['title'],
//				'description' => $data['description'],
//			]
//		);
        $post = new Post();
        $post->title = $data['title'];
        $post->user_id = $data['user_id'];
        $post->description = $data['description'];
        $post->save();
        return redirect()->route('posts.show', ['post' => $post->id]);
    }
    // another way to store data with Dependency Injection
//	public function store2(Request $request) {
//		// this ->>>>> request() = $request
//		$title = $request->title;
//		$description = $request->description;
//	}
    public function edit($post)
    {
        // show the form to edit the post with the id to show the data in the form
        $post = Post::findOrFail($post);
        $users = User::all();
//		dd($post);
        return view('posts.edit', ['post' => $post, 'users' => $users]);
    }

    public function update($post)
    {
        // update the post with the id
        $data = request()->all();
        $post = Post::findOrFail($post);
        $post->title = $data['title'];
        $post->user_id = $data['user_id'];
        $post->description = $data['description'];
        $post->save();
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function destroy($post)
    {
        // delete the post with the id
//		Post::where('id', $post)->delete(); // in single query
        $post = Post::findOrFail($post);
        $post->delete();
        return redirect()->route('posts.index');
    }
}


/*
 * php artisan tinkerCommand
 * php artisan tinker
 * php artisan tinker --help
 * php artisan tinker --version
 * php artisan tinker --ansi
 * php artisan tinker --no-ansi
 * php artisan tinker --quiet
 *
 */
