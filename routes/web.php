<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ProUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersAuthController;
use App\Models\Comment;

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
        Route::get('post_details/{id}',[PostController::class,'postDetails'])->name('admin#postDetails');
        Route::post('post_edit',[PostController::class,'postEdit'])->name('admin#postEdit');
        Route::get('post_delete/{id}',[PostController::class,'postDelete'])->name('admin#deletePost');
         //show in category
         Route::get('admin/select/category/{key}',[AdminController::class,'selectCategory'])->name('admin#electByCategory');

        //Ajax controller
        Route::get('ajax/add_like',[AjaxController::class,'addLike'])->name('admin#addLike');
        Route::get('ajax/add_unlike',[AjaxController::class,'addUnlike'])->name('admin#addUnlike');
        Route::get('ajax/add_viewCount',[AjaxController::class,'addViewCount'])->name('admin#addViewCount');
        //comment
        Route::get('write_comments',[AjaxController::class,'writeComments'])->name('admin#writeComments');
        Route::get('delete/comment/{id}',[CommentController::class,'deleteComment'])->name('admin#deleteComment');

        //change role
        Route::get('admin/change_role',[AdminController::class,'changeRole'])->name('admin#changeRole');
        Route::post('ajax/change_role',[AjaxController::class,'changeRole'])->name('ajax#changeRole');
    });

    //pro
    Route::middleware(['prefix'=>'pro','proAuthMiddleware'])->group(function(){
        Route::get('/home',[ProUserController::class,'proHome'])->name('pro#homePage');
    });


    //default users
    Route::middleware(['usersAuthMiddleward'])->group(function(){
        Route::get('/home',[UsersAuthController::class,'usersHome'])->name('users#homePage');
        Route::get('/post/details/{id}',[UsersAuthController::class,'userPostDetails'])->name('user#postDetails');


        //user profile
        Route::get('/user/profile',[UsersAuthController::class,'userProfile'])->name('user#profilePage');
        Route::post('user/profile/edit',[UsersAuthController::class,'userProfileEdit'])->name('user#profileEdit');
        Route::post('user/update/password',[UsersAuthController::class,'userPasswordUpdate'])->name('user#passwordUpdate');

        //user add like
        Route::get('user/Ajax/add_like',[AjaxController::class,'addLike'])->name('user#addLike');
        Route::get('user/Ajax/add_unlike',[AjaxController::class,'addUnlike'])->name('user#unlike');
        Route::get('user/Ajax/view_count',[AjaxController::class,'addViewCount'])->name('user#viewCount');
        Route::get('user/Ajax/comment',[AjaxController::class,'writeComments'])->name('user#sendComment');
        Route::get('user/Ajax/delete_commment/{id}',[AjaxController::class,'deleteComment'])->name('user#deleteCommetn');

        //show in category
        Route::get('user/select/category/{key}',[UsersAuthController::class,'selectCategory'])->name('selectByCategory');
    });

});
