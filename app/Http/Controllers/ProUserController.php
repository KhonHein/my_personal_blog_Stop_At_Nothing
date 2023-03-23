<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProUserController extends Controller
{
    //deirect pro home page
    public function proHome(){
        return view('pro.index');
    }
}
