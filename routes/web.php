<?php

use Illuminate\Support\Facades\Route;

//Route::view('/{any}','app')->where('any','.*');
Route::view('/','app')->name('home');


$pages = [
    'news','about'
];
foreach ($pages as $page){
    Route::view('/'.$page,'app');
}



Route::view('/posts/{any}','app')->where('any', '.*');

Route::view('/irvan/t','insertposts');
//Route::view('/','app');

Route::prefix('dashboard')->group(function (){
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::view('/posts', 'dashboard.posts.index',['title'=>'posts'])->name('posts.index');
});

