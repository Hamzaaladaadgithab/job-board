<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    function index() {
        $data = Comment::all();

        return view('comment.index', ['comments' => $data , 'pagetitle' => 'Blog']);
}




function create(){
    // Comment::create([
    // 'author' => 'Hamza',
    // 'content' => 'this  another is a test  comment',
    // 'post_id' => 4,
    // ]);

    Comment ::factory(50)->create();
    return redirect('/comments');
}







}
