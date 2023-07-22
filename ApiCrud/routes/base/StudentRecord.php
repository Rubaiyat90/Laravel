<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/student_records', [StudentController::class, 'index'])->name('student_records.index');
Route::post('/student_records', [StudentController::class, 'store'])->name('student_records.store');
Route::get('/student_records/{id}', [StudentController::class, 'edit'])->name('student_records.edit');
Route::put('/student_records/{id}', [StudentController::class, 'update'])->name('student_records.update');
Route::delete('/student_records/{id}', [StudentController::class, 'destroy'])->name('student_records.destroy');