<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class , 'index']);

Route::get('/about' , [IndexController::class,'about']);

Route::get('/contact' , [IndexController::class,'contact']);

Route::get('/job' , [IndexController::class,'index']);


Route::get('/layout' , [IndexController::class,'contact']);


