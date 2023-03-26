<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProUserController;
use App\Http\Controllers\CategoryController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'checkRole'])->name('dashboard');

    // admin
    Route::middleware(['adminAuthMiddleware'])->group(function () {
        Route::get('/index',[AdminController::class,'adminIndex'])->name('admin#home');
        Route::get('/profile_page',[AdminController::class,'adminProfilePage'])->name('admin#profilePage');
        Route::get('/admin/home',[AdminController::class,'adminHome'])->name('admin#homePage');

        //admin profile update
        Route::post('/profile_update',[AdminController::class,'adminProfileUpdate'])->name('admin#profileUpdate');
        Route::post('/password_update',[AdminController::class,'adminPasswordUpdate'])->name('admin#passwordUpdate');

        //add-post page
        Route::get('/add_post',[AdminController::class,'adminAddPost'])->name('admin#addPostPage');

        //category
        Route::post('/add_category',[CategoryController::class,'adminAddCategory'])->name('admin#addCategory');

        // post
        Route::post('add_post',[PostController::class,'adminAddPost'])->name('admin#addPost');
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
