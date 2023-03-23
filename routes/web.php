<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'checkRole'])->name('dashboard');

    // admin
    Route::middleware(['adminAuthMiddleware'])->group(function () {
        Route::get('/home',[AdminController::class,'adminHome'])->name('admin#home');
        Route::get('/profile_page/{id}',[AdminController::class,'adminProfilePage'])->name('admin#profilePage');
    });

    //pro
    Route::middleware(['prefix'=>'pro','proAuthMiddleware'])->group(function(){
        Route::get('/home',[ProUserController::class,'proHome'])->name('pro#homePage');
    });


    //default users
    Route::middleware(['prefix'=>'user','usersAuthMiddleward'])->group(function(){
        Route::get('/home',[UsersAuthController::class,'usersHome'])->name('users#homePage');
    });

});
