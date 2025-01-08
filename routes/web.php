<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Management\CompanyController;
use App\Http\Controllers\Management\CustomerController;
use App\Http\Controllers\Management\MenuController;
use App\Http\Controllers\Management\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/','auth.login')->name('login');
Route::view('sign-up','auth.signup')->name('sign.up');
Route::post('sign-up',[RegisterController::class,'signUp'])->name('sign.up');
Route::post('aunthenticate-user',[LoginController::class,'authenticateUser'])->name('authenticate.user');

Route::group(['middleware'=>'auth'],function(){
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('logout',[LoginController::class,'logout'])->name('logout');

    Route::get('management-menu',[MenuController::class,'managementMenu'])->name('management.menu');

    Route::resources([
        'branches' =>CompanyController::class,
        'users'    =>UserController::class,
        'customers'=>CustomerController::class,
    ]);
});