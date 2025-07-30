<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource("posts",PostController::class);
Route::post("register", [AuthController::class, 'register']);
Route::post("login", [AuthController::class, 'login']);
Route::post("logout", [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/excel', [ExportController::class, 'exportPosts']);
Route::get('/pdf', [ExportController::class, 'exportPdfWithSpatie']);
