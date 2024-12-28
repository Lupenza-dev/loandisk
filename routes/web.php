<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/','auth.login')->name('home');
Route::view('sign-up','auth.signup')->name('sign.up');