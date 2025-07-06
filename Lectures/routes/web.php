<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/home');
Route::get('/aboutssss', function () {
    return view('about');
})->name('about');
Route::get('contact-us', function () {
    return view('contact');
})->name('contact');

Route::get('/index/copy/blogssss', function () {
    return view('blog');
})->name('blog');

Route::get('js', function() {
    return view('js_value.reading_js');
});

Route::get('/thome', function () {
    return view('template.home');
})->name('home');
Route::get('/tabout', function () {
    return view('template.about');
})->name('about');

Route::prefix('pages')->group(function(){

Route::get('user1', function () {
    return view('pages.user_1');
})->name('user_1');
Route::get('user2', function () {
    return view('pages.user_2');
})->name('user_2');

});


// Route::view('about' , '/about');
// Route::redirect('about', 'blog');

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


