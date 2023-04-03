<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class AdminController extends Controller
{
    //direct admin index
    public function adminIndex(){
        return view('admin.index');
    }

    //admin profile
    public function adminProfilePage(){
       // dd(Auth::user()->img);
        return view('admin.profilePage');
    }

    // admin profile update
    public function adminProfileUpdate(Request $request){
        $validator =  $this->dataValidation($request);
        if(!$validator){
            return back()->withErrors($validator)->withInput();
        }
        $data = $this->getUserData($request);

        if($request->hasFile('userImage')){
            $newImg =$request->userImage;
            $newImgName =uniqid().'KhonHein'.$newImg->getClientOriginalName();
            $data +=['image' =>$newImgName];
            $newImg->storeAs('public',$newImgName);


            $dbImg =User::where('id',Auth::user()->id)->first();
            $dbImg = $dbImg->image;
            if($dbImg != null){
                Storage::delete('public/'.$dbImg);
            }
        }

        User::where('id',Auth::user()->id)->update($data);

        return redirect()->route('admin#profilePage')->with(['changedProfile' => ' , you changed your profile data']);
    }
    //direct admin home page
    public function adminHome(){
        $categories = Category::get();
        $posts =Post::when(request('key'),function($query){
            $query->orWhere('title','like','%'.request('key').'%')
                  ->orWhere('description','like','%'.request('key').'%');
        })->get();
        return view('admin.home',compact('categories','posts'));
    }

        //select by category
        public function selectCategory($key){
            $categories = Category::get();
            $posts =Post::where('category', $key)->get();

            return view('admin.home',compact('categories','posts'));
        }

    //admin password update
    public function adminPasswordUpdate(Request $request){
        $validator = $this->passwordValidation($request);
        if(!$validator){
            return back()->withErrors($validator)->withInput();
        }
        $newPassword =Hash::make($request->newPassword);
        $userDbPass = User::where('id',Auth::user()->id)->first();
        $userDbPass = $userDbPass->password;
        $oldPassword = $request->oldPassword;
        if(Hash::check($oldPassword,$userDbPass)){
            $data = ['password' => $newPassword];
            User::where('id',Auth::user()->id)->update($data);
            return back()->with(['updateSuccess' => 'updated password successful']);
        }else{
            return back()->with(['confirmFail' => 'your old confirm password is not match']);
        }
    }

    //admin add-post
    public function adminAddPost(){
        $categories =Category::get();
        return view('admin.add-post',compact('categories'));
    }

    //direct user list and change role
    public function changeRole(){
        $users = User::get();
        return view('admin.changeRole',compact('users'));
    }

    //porfile update valication
    private function dataValidation(Request $request){
        $rules = [
            'userName' => 'required|max:20',
            'userEmail'=> 'required',
            'userAddress' => 'required',
            'userPhone' => 'required|max:15,min:10',
            'userImage' => 'image|mimes:jpeg,jpg,png,gif',
        ];
        $message = [
            'userName.required' => 'user name is required',
            'userName.max' => 'user name is too long',
            'userEmail.required' => 'user email is required',
            'userPhone.required' => 'user phone is required',
            'userPhone.max' => 'user phone is too much number',
            'usereImage.mimes' => 'usere image must be type of image or jpeg,png,jpg,gif',
        ];
        return Validator::make($request->all(),$rules,$message)->validate();
    }
    //get user Data
    private function getUserData(Request $request){
        return [
            // 'id' => $request->userId,
            'name' => $request->userName,
            'email' => $request->userEmail,
            'address' => $request->userAddress,
            'phone' => $request->userPhone,
            'gender' => $request->userGender,
        ];
    }
    //password validation
    private function passwordValidation(Request $request){
        $rules = [
            'newPassword' =>'required|min:6',
            'confrimPassword' => 'required|same:newPassword',
            'oldPassword' =>'required'
        ];
        $message= [
            'newPassword.required' => 'new password is required',
            'newPassword.min:6' => 'your password is not strong',
            'confirmPassword.required' => 'confirm password is required',
            'confirmPassword.same:newPassword' => 'confirm is not same your new password',
            'oldPassword.required' => 'old password is required '
        ];
        return Validator::make($request->all(),$rules,$message)->validate();
    }
}
