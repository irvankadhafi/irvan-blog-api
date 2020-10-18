<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('Auth')->group(function (){
    Route::post('register','RegisterController');
    Route::post('auth/login','LoginController');
    Route::post('auth/logout','LogoutController');
});

Route::namespace('Post')->middleware('auth:api')->group(function (){
    Route::post('new-post','PostController@store');
    Route::post('update-post/{post:id}','PostController@update');
    Route::delete('delete-post/{post:id}','PostController@destroy');
});
Route::get('categories','Post\CategoryController@index');
Route::get('info','WebController@index');

Route::get('posts/{post:slug}','Post\PostController@show')->name('posts.show');
Route::get('posts','Post\PostController@index');

Route::get('auth/user','UserController');
