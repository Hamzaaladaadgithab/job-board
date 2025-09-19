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
    Comment::create([
    'author' => 'Hamza...',
    'content' => 'this is a test  comment',
    'post_id' => 2,
    ]);


    return redirect('/comments');
}







}
