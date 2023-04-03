<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    // add like post
    public function addLike(Request $request){
         $data = [
            'like_count' =>$request->countNumber,
         ];
         //logger($data);
         Post::where('id',$request->postId)->update($data);
         return response()->json();
    }

    // add unlike conunt
    public function addUnlike(Request $request){
        $data = [
           'unlike_count' =>$request->countNumber,
        ];
        //logger($data);
        Post::where('id',$request->postId)->update($data);
        return response()->json();
   }

   //add view count
   public function addViewCount(Request $request){
    $data = [
        'view_count' =>$request->countNumber,
     ];
     Post::where('id',$request->postId)->update($data);
     return response()->json();
   }

   //direct write comment
   public function writeComments(Request $request){
    $data = [
        'post_id' => $request->postId,
        'user_id' => $request->userCommentId,
        'user_name' => $request->userCommentName,
        'comment_message' => $request->commentMessage,
    ];
    Comment::create($data);
    return response()->json();
}

    //delete commetn
    public function deleteComment($id){
        Comment::where('id', $id)->delete();
        return back();
    }

    // admin change role
    public function changeRole(Request $request){
    $data = [
        'role' => $request->userRole,
        // 'id' => $request->user_id_role
    ];

    User::where('id',$request->user_id_role)->update($data);
    return back();
    }

    // direc select in categories
    public function selectCategory(){

    }


}


