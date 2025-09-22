<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
function index() {
        $data = Tag::all();

        return view('tag.index', ['tags' => $data , 'pagetitle' => 'Tags']);
}


function create(){
    Tag::create([
        'title' => 'Software Engineering']);

    return redirect('/tags');
}



    function testmanytomany(){
    // $post1 = Post::find(6);
    // $post2 = Post::find(7);

    // if(!$post1 || !$post2) {
    //     return response()->json(['error' => 'Post bulunamadı']);
    // }

    // $post1->tags()->attach([6,7]);
    // $post2->tags()->attach([6]);

    // return response()->json([
    //     'post1' => $post1->tags,
    //     'post2' => $post2->tags
    // ]);



    $tag = Tag::find(6);

    $tag->posts()->attach([2]);

    return response()->json(([
        'tag' => $tag->title,
        'posts' => $tag->posts,
    ]));
}


    }

















