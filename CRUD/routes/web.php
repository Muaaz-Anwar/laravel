<?php

use App\Http\Controllers\employeeController;
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


Route::controller(employeeController::class)->group(function(){
    Route::get('/employee' ,'index')->name('employee');
    Route::post('/add_employee' ,'create')->name('add_employee');
    Route::get('/view_employee','view')->name('view_employee');
    Route::get('edit_employee/{id}','edit')->name('edit_employee');
    Route::delete('delete_employee/{id}','delete')->name('delete_employee');
    Route::put('update_employee/{id}','update')->name('update_employee');
});
