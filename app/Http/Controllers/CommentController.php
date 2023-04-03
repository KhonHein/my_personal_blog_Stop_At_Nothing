<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // //direct write comment
    // public function writeComments(Request $request){
    //     $data = [
    //         'post_id' => $request->postId,
    //         'user_id' => $request->userCommentId,
    //         'user_name' => $request->userCommentName,
    //         'comment_message' => $request->commentMessage,
    //     ];
    // }

    //delete comment
    public function deleteComment($id){
        Comment::where('id',$id)->delete();
        return back();
    }
}
