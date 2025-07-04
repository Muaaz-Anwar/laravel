<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('about' , '/about');


// ID is required to access this file
// Route::get('/user/{id}', function ($id) {
//  return "<h2>User id is: ". $id ." </h2>";

// });

// ID is not required to access this file and you can get as much para's as you want
Route::get('/user/{id?}/comment/{cid?}', function ($id = null, $cpara = null) {
    return "<h2>No User</h2> <h2>No comment</h2>";
    // whereNumeric //whereAlphaNumeric //whereAlpha
    //whereIn('id', ['acceptable values', '']);
})->where('id', '[a-zA-Z0-9+]+')->whereIn('cid', ['song', 'movie']);



// Universal of printing error 404
Route::fallback(function () {
    return view('error');
});

// how to test routes with console, get all routes in terminal, get all routes that we created with --except-vendor
// get specific route with --path=post


