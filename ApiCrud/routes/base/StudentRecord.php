<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::resource('/student_records',StudentController::class);