<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::controller(UserController::class)->group(function(){
    Route::get("/" ,"index")->name("view_user");
    Route::get("/add", "add")->name("add_user");
    Route::post("/adding", "store")->name("add");
    Route::get("edit/{id}","edit")->name('edit_user');
    Route::get("delete/{id}","delete")->name('delete_user');
    Route::post('update/{id}','update')->name('update_user');
});
