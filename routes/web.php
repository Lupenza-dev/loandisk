<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Management\CompanyController;
use App\Http\Controllers\Management\CustomerController;
use App\Http\Controllers\Management\LoanController;
use App\Http\Controllers\Management\LoanSettingController;
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
    Route::get('loan-menu',[MenuController::class,'LoanMenu'])->name('loan.menu');
    Route::get('customer-create',[CustomerController::class,'create'])->name('create.customer');
    Route::get('get-districts/{region_id}',[CustomerController::class,'getDistrict']);
    Route::get('loan-types',[LoanSettingController::class,'loanTypes'])->name('loan.types.index');
    Route::post('loan-type-store',[LoanSettingController::class,'loanTypeStore'])->name('loan.type.store');
    Route::get('workflows-level-list',[LoanSettingController::class,'getWorkFlowLevel'])->name('workflows.index');
    Route::post('workflows-level-store',[LoanSettingController::class,'storeWorkFlowLevel'])->name('level.store');
    Route::get('loans',[LoanController::class,'allLoans'])->name('loan.index');
    Route::get('create-loan',[LoanController::class,'createLoan'])->name('create.loan');
    Route::get('get-plan/{loan_type_id}',[LoanController::class,'getPlan'])->name('get.plan');
    Route::resources([
        'branches' =>CompanyController::class,
        'users'    =>UserController::class,
        'customers'=>CustomerController::class,
    ]);
});