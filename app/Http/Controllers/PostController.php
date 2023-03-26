<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
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

    //post validation check
    private function postValidationCheck(Request $request){
        $rules=[
            'postTitle' => 'required',
            'postImage' => 'image|mimes:jpeg,jpg,png',
            'postDescription'=>'required',
            'postSound' =>'mimes:mp3,wav,',
            'postCategory' => 'required',
        ];
        $message=[
            'postTitle.required' =>'post title is required',
            'postImage.mimes' => 'The image must be a PNG, JPG, or JPEG file.',
            'postDescription.required' => 'post description is required ',
            'postSound.mimes' => 'The sound must be an MP3 or WAV file.',
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
