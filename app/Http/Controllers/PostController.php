<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //admin posting post
    public function adminAddPost(Request $request){
        $validator = $this->postValidationCheck($request);
        if(!$validator){
            return back()->withErrors($validator)->withInput();
        }
        $data = $this->getPostData($request);

        // get post image
        if($request->hasFile('postImage')){
            $img = $request->postImage;
            $imgName = uniqid().'KhonHein'.$img->getClientOriginalName();
            $request->postImage->storeAs('public', $imgName);

            $data +=[
                'image' =>$imgName,
            ];
        }
        //get post voice sound
        if($request->hasFile('postSound')){
            $sound = $request->postSound;
            $soundName = uniqid().'KhonHein'.$sound->getClientOriginalName();
            $request->postSound->storeAs('public',$soundName);

            $data += [
                'sound' =>$soundName,
            ];
        }

        Post::create($data);
        return back()->with(['postdSuccess' => 'you postd one topic successful']);
    }

    //direct  post details
    public function postDetails($id){
        $post = Post::where('id',$id)->first();
        $categories = Category::get();
        $comments = Comment::where('post_id',$id)->get();
        //dd($comments);
        return view('admin.detail',compact('post','categories','comments'));;
    }
    //post edit
    public function postEdit(Request $request){
        $validator = $this->postValidationCheck($request);
        if(!$validator){
            return back()->withErrors($validator)->withInput();
        }
        $data = $this->getPostData($request);
        $dbPost =Post::where('id',$request->postId)->first();
        // get post image
        if($request->hasFile('postImage')){
            $img = $request->postImage;
            $imgName = uniqid().'KhonHein'.$img->getClientOriginalName();
            $request->postImage->storeAs('public', $imgName);

            $dbImg =$dbPost->image;
            if($dbImg != null){
                Storage::delete('public/'.$dbImg);
            }
            $data +=[
                'image' =>$imgName,
            ];
        }
        //get post voice sound
        if($request->hasFile('postSound')){
            $sound = $request->postSound;
            $soundName = uniqid().'KhonHein'.$sound->getClientOriginalName();
            $request->postSound->storeAs('public',$soundName);

            $data += [
                'sound' =>$soundName,
            ];

            $dbSound =$dbPost->sound;
            if($dbSound != null){
                Storage::delete('public/'.$dbSound);
            }
        }

        Post::where('id',$request->postId)->update($data);
        return back()->with(['editSuccess' => ' , you edited your post information']);
    }

    //post delete
    public function postDelete($id){
        Post::where('id',$id)->delete();
        return redirect()->route('admin#homePage');
    }

    //post validation check
    private function postValidationCheck(Request $request){
        $rules=[
            'postTitle' => 'required',
            'postImage' => 'image|mimes:jpeg,jpg,png',
            'postDescription'=>'required',
            'postSound' =>'mimes:mp3,wav|max:2048',
            'postCategory' => 'required',
        ];
        $message=[
            'postTitle.required' =>'post title is required',
            'postImage.mimes' => 'The image must be a PNG, JPG, or JPEG file.',
            'postDescription.required' => 'post description is required ',
            'postSound.mimes' => 'The sound must be an MP3 or WAV file.',
            'postSound.max' => 'The sound must be under or 5Mb.',
            'postCategory.required' => 'category is required to select'
        ];
        return Validator::make($request->all(),$rules,$message)->validate();
    }

    //get post data
    private function getPostData(Request $request){
        return [
            'title' => $request->postTitle,
            'description'=>$request->postDescription,
            // 'image' =>$request->postImage,
            // 'sound'=>$request->postSound,
            'category'=>$request->postCategory,
            'status' =>$request->postStatus,
        ];
    }
}
