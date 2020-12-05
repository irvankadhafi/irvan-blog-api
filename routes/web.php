<?php

use Illuminate\Support\Facades\Route;

//Route::view('/{any}','app')->where('any','.*');;
Route::view('/','app')->name('home');
$pages = [
    'news','about','login','register'
];
foreach ($pages as $page){
    Route::view('/'.$page,'app');
}
Route::view('/posts/{any}','app')->where('any', '.*');

$adminPages = [
    'dashboard'
];
foreach ($adminPages as $admin){
    Route::view('/'.$admin.'{any}','admin')->where('any', '.*');
}
Route::view('/posts/{any}','app')->where('any', '.*');

