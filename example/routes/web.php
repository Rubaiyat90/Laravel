<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::resource('jobs', JobController::class);

Route::get('/register',[RegisteredUserController::class,'create'] );
Route::post('/register',[RegisteredUserController::class,'store'] );

Route::get('/login',[LoginUserController::class,'create'] );
Route::post('/login',[LoginUserController::class,'store'] );
Route::post('/logout',[LoginUserController::class,'destroy'] );
