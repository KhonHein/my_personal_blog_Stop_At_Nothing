<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RouterController extends Controller
{
    //api login
    public function userLogin(Request $request){

        $user = User::where('email', $request->email)->first();
        //dd($user);
        if(isset($user)){
            if(Hash::check($request->password, $user->password)){
                return response()->json([
                    'userData' => $user,
                    'token' => $user->createToken(time())->plainTextToken
                ],200);
            }else{
                return response()->json(
                    [
                        'status' => 'false',
                        'message' => 'invalic password'
                    ]
                );
            }
        }else{
            return response()->json(
                ['status' => 'false',
                'message' =>' no user found']
            );
        }
    }

    //user register
    public function userRegister(Request $request){
        $data =[
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>$request->password,
        ];

        User::create($data);
        $user =User::where('email',$request->email)->first();
        return response()->json([
            'userData' => $user,
            'token' => $user->createToken(time())->plainTextToken
        ],200);
    }
    //user request posts from API link
    public function getPostFromAPI(){
        $categories = Category::get();
        $posts =Post::when(request('keyword'),function($query){
            $query->orWhere('title','like','%'.request('keyword').'%')
                  ->orWhere('category','like','%'.request('keyword').'%')
                  ->orWhere('description','like','%'.request('keyword').'%');
        })->get();
        $data = [
                'category' => $categories,
                'posts' => $posts,
            ];
        return response()->json($data);
    }
}
