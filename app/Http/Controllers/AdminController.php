<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    //direct admin home
    public function adminHome(){
        return view('admin.index');
    }

    //admin profile
    public function adminProfilePage($id){
        $user = User::where('id', $id)->first();
        //dd($user->name);
        return view('admin.profilePage',compact('user'));
    }
}
