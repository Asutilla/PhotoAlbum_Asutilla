<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::view('/', 'layouts.app')->name('layouts');
Route::view('/page1', 'pages.page1')->name('page1');
Route::view('/page2', 'pages.page2')->name('page2');
Route::view('/page3', 'pages.page3')->name('page3');
Route::view('/page4', 'pages.page4')->name('page4');
Route::view('/page5', 'pages.page5')->name('page5');