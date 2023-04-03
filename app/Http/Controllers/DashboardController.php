<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
        // direct first home page check role
        public function checkRole(){
            if(Auth::user()->role === 'admin'){
                return view('admin.index');
            }else if(Auth::user()->role === 'pro'){
                return view('pro.index');
            }else if(Auth::user()->role === 'user'){
                return redirect()->route('users#homePage');
            }else{
                return view('auth.login');
            }
        }
}
