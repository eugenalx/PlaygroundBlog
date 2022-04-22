<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::latest()->with('user')->paginate(10);
        return view('/posts/indexPosts',[
            'posts' => $post->sortDesc()
        ]);
    }

    public function showUserPosts(User $user)
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);
        if(!$attributes){
            throw ValidationException::withMessages([
                'name' => 'The name is too long!',
            ]);
        }
        $post->update($attributes);
        return redirect('/')->with('succes', 'The post has been saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success','The post was deleted!');
    }

    protected function validatePost(?Post $post = null) : array
    {
        $post ??= new Post();
        return request()->validate([
            'name' => 'required|max:100',
            'body' => 'required',
        ]);
    }
}
