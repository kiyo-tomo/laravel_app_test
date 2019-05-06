<?php

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

// // Top
// Route::get('/home', function(){
// 	return view('home');
// });

// Regist User 
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

// Login Form
Route::get('/auth/login', 'Auth\LoginController@showLoginForm');
Route::post('/auth/login', 'Auth\LoginController@login');

// Logout
Route::get('/auth/logout', 'Auth\LoginController@logout');

// Top of this site.
Route::get('/', 'PostsController@index')->name('top');

// Post and comment
Route::resource('comments', 'CommentsController', ['only' => ['store']]);
Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);
