<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    // bunlar web icin
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::Paginate(10);
        return view('post.index', ['posts' => $data , 'pagetitle' => 'Blog']);
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
    public function store(Request $request)
    {
        //@TODO
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('post.show', ['post'=> $post , 'pagetitle'=> $post->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Post::find($id);
        return view('post.edit', ['post'=> $data , 'pagetitle' => 'Edit post']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
