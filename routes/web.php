<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\Route;




// public route

Route::get('/', IndexController::class );


Route::get('/contact' , ContactController::class);


Route::get('/job' , [JobController::class,'index']);

Route::resource('tags', TagController::class);


// Signup
Route::get('/signup', [AuthController::class, 'showsignupform'])->name('signup');

Route::post('/signup', [AuthController::class, 'signup']);

// Login
Route::get('/login', [AuthController::class, 'showloginform'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');






// protected route

Route::middleware('auth')->group(function () {

    Route::resource('blog', PostController::class);

    Route::resource('comments', CommentController::class);


});


Route::middleware('OnlyMe')->group(function () {

    Route::get('/about' , AboutController::class);

});

