<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

function getUsers()
    {
      return  [
            '1' => ['name' => 'John', 'age' => 25],
            '2' => ['name' => 'Sara', 'age' => 30],
            '3' => ['name' => 'Ali', 'age' => 22],
            '4' => ['name' => 'Emma', 'age' => 28],
            '5' => ['name' => 'David', 'age' => 35]
        ];
    };

Route::get('/', function () {
    return view('welcome');
})->name('/home');

Route::get('/aboutssss', function () {

        $users = [
        '1' => ['name' => 'John', 'age' => 25],
        '2' => ['name' => 'Sara', 'age' => 30],
        '3' => ['name' => 'Ali', 'age' => 22],
        '4' => ['name' => 'Emma', 'age' => 28],
        '5' => ['name' => 'David', 'age' => 35]
    ];

    // return view('about');
    return view('about', ['user' => "Muaaz", "script" => "", 'users' => $users]);
    // return view('about')->with('user', 'muaaz')->with('script', "ok");
})->name('about');

Route::get('viewusers/{id}', function ($id) {
    $users = getUsers();
    abort_if(!isset($users[$id]), 404);
    $user = $users[$id];
    return view('viewusers', ['id' => $user]);
})->name('view.user');

Route::get('contact-us', function () {
    return view('contact');
})->name('contact');

Route::get('/index/copy/blogssss', function () {
    return view('blog');
})->name('blog');

Route::get('js', function () {
    return view('js_value.reading_js');
});

Route::get('/thome', function () {
    return view('template.home');
})->name('home');
Route::get('/tabout', function () {
    return view('template.about');
})->name('about');

Route::prefix('pages')->group(function () {

    Route::get('index', function () {
        return view('pages.index');
    })->name('user_1');
});


Route::view('route', 'routes', ['name' => ['one' => 'this is when']]);
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



Route::controller(PageController::class)->group(function(){
    Route::get('controller/{id?}', 'show')->name('p_home');
    Route::get('addcontroller', 'add')->name('add_home');
    Route::get('updatecontroller/{id?}', 'update')->name('update_home');
    Route::get('deletecontroller/{id}', 'delete')->name('delete_home');
});


// how to test routes with console, get all routes in terminal, get all routes that we created with --except-vendor
// get specific route with --path=post
