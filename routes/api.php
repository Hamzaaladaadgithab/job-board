<?php

use App\Http\Controllers\api\v1\PostApiController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\Tag;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\Route;

 // rest api ful api http standard


Route ::prefix('v1') ->group( function(){

    Route::apiResource("post", PostApiController::class);
});



