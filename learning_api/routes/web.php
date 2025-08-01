<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/book', [StudentController::class, 'book']);
Route::resource('student',StudentController::class);
Route::resource('user',UserController::class);
