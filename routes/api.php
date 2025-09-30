<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\PostApiController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\Tag;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\Route;

// rest api ful api http standard

// /v1/auth/login

// /v1/auth/loout

// /v1/auth/me

// /v1/auth/refresh



    Route ::prefix('v1') ->group( function(){

    Route::apiResource("post", PostApiController::class)->middleware('auth:api');

    Route ::prefix('auth') ->group( function(){

    Route::post("login", [AuthController::class , 'login']);


        // pnly if i am authenticade with jwt

    Route::middleware("auth:api")->group( function(){

        Route::post("refresh", [AuthController::class , 'refresh']);

        Route::get("me", [AuthController::class , 'me']);

        Route::post("logout", [AuthController::class , 'logout']);




    });

    });

});



