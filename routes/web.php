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


  // admin

Route::middleware('role:admin')->group(function(){

Route::delete('/blog/{id}', [PostController::class,'destroy'])->name('blog.destroy');
});



// editor , admin
Route::middleware('role:editor,admin')->group(function(){

    Route::get('/blog/create', [PostController::class,'create'])->name('blog.create');
    Route::post('/blog', [PostController::class,'store'])->name('blog.store');
    Route::get('/blog/{post}/edit', [PostController::class,'edit'])->name('blog.edit')->can('apdate' , 'post');
    Route::patch('/blog/{post}', [PostController::class,'update'])->name('blog.update')->can('apdate' , 'post');

    });


// viewer , admin , editor
Route::middleware('role:viewer,editor,admin')->group(function(){

    Route::get('/blog', [PostController::class,'index'])->name('blog.index');
    Route::get('/blog/{id}', [PostController::class,'show'])->name('blog.show');
    Route::resource('comments', CommentController::class);

    });


});


Route::middleware('OnlyMe')->group(function () {

    Route::get('/about' , AboutController::class);

});


