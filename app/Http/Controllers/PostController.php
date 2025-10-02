<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Post;

use Illuminate\Contracts\Auth\Access\Gate as AccessGate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{

    // bunlar web icin
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::latest()->paginate(10);

        return view('post.index', ['posts' => $post , 'pagetitle' => 'Blog']);
}
        //


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', ['pagetitle' => 'Create new post']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->published = $request->has('published') ? true : false;
        $post->user_id = Auth::id();


        $post->save();

        return redirect()->route('blog.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', ['post'=> $post , 'pagetitle'=> $post->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', ['post'=> $post , 'pagetitle' => 'Blog - Edit Post:' . $post->title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request,Post $post)
    {


        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->published = $request->has('published') ? true : false;

        $post->save();

        return redirect()->route('blog.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post= Post::findOrFail($id);
        $post->delete();


        return redirect()->route('blog.index')->with('success',' Post deleted successfully.');
    }
}
