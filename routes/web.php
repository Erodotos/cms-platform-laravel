<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index');

/*

    GET     : /posts        (show all posts)
    GET     : /posts/create (create a new post)
    GET     : /posts/1      (show a specific post)
    POST    : /posts        (stoe a new post)  
    GET     : /posts/1/edit (edit a post)
    PATHCH  : /posts/1      (update a post)
    DELETE  : /posts/1      (delete a post)

*/

Route::get('/posts', 'App\Http\Controllers\PostsController@index');

Route::get('/posts/create', 'App\Http\Controllers\PostsController@create');

Route::get('/posts/{post}', 'App\Http\Controllers\PostsController@show');

Route::post('/posts', 'App\Http\Controllers\PostsController@store');

Route::post('/storeFile', 'App\Http\Controllers\PostsController@storeFile');

Route::get('/posts/{post}/edit', 'App\Http\Controllers\PostsController@edit');

Route::patch('/posts/{post}', 'App\Http\Controllers\PostsController@update');

Route::delete('/posts/{post}', 'App\Http\Controllers\PostsController@destroy');


/*

    GET     : /categories        (show all categories)
    GET     : /categories/create (create a new categories)
    GET     : /categories/1      (show a specific categories)
    POST    : /categories        (stoe a new categories)  
    GET     : /categories/1/edit (edit a categories)
    PATHCH  : /categories/1      (update a categories)
    DELETE  : /categories/1      (delete a categories)

*/

Route::get('/categories', 'App\Http\Controllers\CategoriesController@index');

Route::get('/categories/create', 'App\Http\Controllers\CategoriesController@create');

Route::get('/categories/{category}', 'App\Http\Controllers\CategoriesController@show');

Route::post('/categories', 'App\Http\Controllers\CategoriesController@store');

Route::get('/categories/{category}/edit', 'App\Http\Controllers\CategoriesController@edit');

Route::patch('/categories/{category}', 'App\Http\Controllers\CategoriesController@update');

Route::delete('/categories/{category}', 'App\Http\Controllers\CategoriesController@destroy');
