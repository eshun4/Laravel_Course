<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// All the routes in your api or web folder
//  can return plain text, a view or even a
//  json or method in a class/controller.

// To give route some name
// we can call the name()
// method

// Sometimes you can specify a constraint
// to your parameter



// Route::get('/', function () {
//     return view("home.index");
// })->name('homepage'); 

// Route::get('/contact', function(){
//     return view("home.contact");
// })->name("contact");

// Routses that just return just html and dont require
// any parameters you can simplify them for exaple the
// 2 above

Route::get('/', [HomeController::class, 'home'])->name('homepage'); //This is an equivalent of the first route defined
Route::get('/contact',[HomeController::class,'contact'])->name("contact");
Route::get('/single', AboutController::class);

$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel',
        'is_new' => true,
        'has_comments' => true
    ],  
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new' => false
    ],
    3 => [
        'title' => 'Intro to Python',
        'content' => 'This is a short intro to Python',
        'is_new' => false
    ]
];

Route::resource('posts', PostsController::class);
//->only(['index', 'show', 'store', 'create', 'edit', 'update']);

// Route::get('/posts', function() use($posts){
//  //dd(request()-> all());S
// //  dd(request()->input('page', 5));
// // compant($posts)=  ['posts' => $posts]
//  return view('posts.index', ['posts' => $posts]);
// });

// Route::get('/posts/{id?}', function($id=2) use($posts){
    

    // abort_if(!isset($posts[$id]), 404);

    // return view('posts.show', ['post' => $posts[$id]]);
    
// })
// ->where([
//     'id' => '[0-9]+'
// ]
// )
// ->name('posts.show');

// Route::get('/recent-posts/{days_ago?}', function($days_ago=5){
//     return "This is recent post number ".$days_ago;
// })->name('recent posts');

// Route::get('/fun/responses', function() use($posts){
// return response($posts, 201)
// ->header('Content-Type', 'application/json')
// ->cookie('MY_COOKIE', 'Kofi Junior', 3600);
// });

// This redirects you to another page
// Route::get('/fun/redirect', function(){
//     return redirect('contact');
// });

// This sends you back to the previous page
// Route::get('/fun/back', function(){
//     return back();
// });

// This sends you to a named route from your route list
// Route::get('/fun/named-routes', function(){
//     return redirect()->route('posts.show');
// });

// This redirects you to another address from your main website
// Route::get('/fun/away', function(){
//     return redirect()->away('https://google.com');
// });

// Route::get('/fun/json', function() use($posts){
//     return response()->json($posts);
// });

// This returns a file download
// Route::get('/fun/download', function(){
//     return response()->download(public_path('images/mountains.jpg', 'otherName.jpg'));
// });

// Input is accessible by using the Request class

Route::prefix('/fun')->name('fun.')->group(function() use($posts){
    Route::get('/responses', function() use($posts){
        return response($posts, 201)
        ->header('Content-Type', 'application/json')
        ->cookie('MY_COOKIE', 'Kofi Junior', 3600);
        })->name('responses');

        Route::get('/redirect', function(){
            return redirect('contact');
        })->name('contact');

        Route::get('/back', function(){
            return back();
        })->name('back');

        Route::get('/named-routes', function(){
            return redirect()->route('posts.show');
        })->name('named-routes');

        Route::get('/away', function(){
            return redirect()->away('https://google.com');
        })->name('away');

        Route::get('/json', function() use($posts){
            return response()->json($posts);
        })->name('json');

        Route::get('/download', function(){
            return response()->download(public_path('images/mountains.jpg', 'otherName.jpg'));
        })->name('download');
});