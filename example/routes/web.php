<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisteredUserController;
use App\Jobs\Translate;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('test', function () {
    $job = Job::first();
    Translate::dispatch($job);
    return 'done';
});

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
Route::patch('/jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth')
    ->can('edit','job');

Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

Route::get('/register',[RegisteredUserController::class,'create'] );
Route::post('/register',[RegisteredUserController::class,'store'] );

Route::get('/login',[LoginUserController::class,'create'] )->name('login');
Route::post('/login',[LoginUserController::class,'store'] );
Route::post('/logout',[LoginUserController::class,'destroy'] );
