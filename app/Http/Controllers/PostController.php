<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{

    function index() {
        $data = Post::Paginate(10);

        return view('post.index', ['posts' => $data , 'pagetitle' => 'Blog']);
}


function create(){

    // $postdata = Post::create([
    //     'title' => 'my find unique post 1 ',
    //     'body' => ' This is the body of the new post.',
    //     'author' => 'Hamza',
    //     'published' => true,
    // ]);

    Post ::factory(200)->create();

    return redirect('/blog');
}


function show($id){
    $post = Post::find($id);
    return view('post.show', ['post'=> $post , 'pagetitle'=> $post->title]);

}


function delete(){

    Post::destroy(4);
}



}
