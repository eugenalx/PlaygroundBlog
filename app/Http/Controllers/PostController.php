<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{

    // public function __construct()
    // {
    //     $this->authorizeResource(Post::class, 'post');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showAllPosts()
    {
        $post = Post::latest()->with('user')->paginate(10);
        return view('/posts/indexPosts',[
            'posts' => $post->sortDesc()
        ]);
    }

    public function index(User $user)
    {
        return view('/posts/indexPost',[
                'posts' => $user->posts->sortDesc()
            ]);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Post::create(array_merge($this->validatePost(),[
            'user_id' => request()->user()->id,
        ]));
        return redirect('/')->with('succes', 'The post has been saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts/editPost', ['post' => $post]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $attributes = $this->validatePost($post);
     
        $post->update($attributes);
        return redirect('/')->with('succes', 'The post has been saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success','The post was deleted!');
    }


    //validation rules
    protected function validatePost(?Post $post = null) : array
    {
        $post ??= new Post();
        return request()->validate([
            'name' => 'required|max:100',
            'body' => 'required',
       ]);
    }
}
