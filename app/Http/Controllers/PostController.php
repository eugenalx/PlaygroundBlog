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
        if($user->id === auth()->user()->id){
            return view('/posts/indexPost',[
                'posts' => $user->posts->sortDesc()
            ]);
        }
        abort(403, 'Unauthorized action.');
        return redirect('/') ;
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

        throw ValidationException::withMessages([
            'name' => 'The name is too long!',
        ]);

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

        // dd($post->user_id);
        if( $post->user_id === auth()->user()->id){
            return view('posts/editPost', ['post' => $post]);
        }

        abort(403, 'Unauthorized action.');
        return redirect('/') ;

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
     
        $post->update($attributes);
        return redirect('/')->with('succes', 'The post has been saved');
        // throw ValidationException::withMessages([
        //     'name' => 'The name is too long!',
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if( $post->user_id === request()->user()->id || request()->user()->role === 'admin'){
            $post->delete();
        return back()->with('success','The post was deleted!');
        }

        abort(403, 'Unauthorized action.');
        return redirect('/') ;
    }

    protected function validatePost(?Post $post = null) : array
    {
        $post ??= new Post();
        return request()->validate([
            'name' => 'required|max:100',
            'body' => 'required',
            'user_id' => request()->user()->id,
        ]);
    }
}
