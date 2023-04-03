<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RouterController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// test API
Route::post('user/login_withAPI',[RouterController::class,'userLogin']);
Route::post('user/register_withAPI',[RouterController::class,'userRegister']);

Route::get('user/get_posts',[RouterController::class,'getPostFromAPI'])->middleware('auth:sanctum');


/**
 * Regiset API links
 * http://127.0.0.1:8000/api/user/register_withAPI(key=> email,password ) post mehtod
 *
 * login API link
 * http://127.0.0.1:8000/api/user/login_withAPI(key=> name,email,password) post method
 *
 * Get  posts and categories by on link but you need a user token ,
 * call this api get method   http://127.0.0.1:8000/api/user/get_posts (key=> keyword) get method
 */
