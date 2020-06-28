<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('Auth')->group(function (){
    Route::post('register','RegisterController');
    Route::post('login','LoginController');
    Route::post('logout','LogoutController');
});

Route::namespace('Post')->middleware('auth:api')->group(function (){
    Route::post('new-post','PostController@store');
    Route::post('update-post/{post:id}','PostController@update');
    Route::delete('delete-post/{post:id}','PostController@destroy');
});

Route::get('posts/{post:slug}','Post\PostController@show');
Route::get('posts','Post\PostController@index');

Route::get('user','UserController');
