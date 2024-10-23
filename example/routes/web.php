<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::resource('jobs', JobController::class);
