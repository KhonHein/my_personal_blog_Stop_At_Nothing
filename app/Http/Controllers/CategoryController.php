<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
        // add new category
        public function adminAddCategory(Request $request){
            $data = ['category_name' => $request->categoryName];
            Category::create($data);
            return back()->with(['addSuccess'=>'you created new category success']);
        }
}
