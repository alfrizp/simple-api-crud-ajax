<?php

use App\Post;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/post', function(){
	$posts = Post::all();
	return view('post.index', compact('posts'));
});

Route::post('/table', function(){
	$posts = Post::all();
	return view('post.table', compact('posts'));
});

Route::get('/example', function(){
	return view('post.example');
});