<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{


    public function add_category(Request $request){
		
        $this->validate($request,[
            'title'=>'required|min:2|max:50'
        ]);
       $category = New Category();
       $category->title = $request->title;
       $category->save();
       return ['message'=>'OK'];
    }

    public function all_category(){
        $categories = Category::all();
        return response()->json([
            'categories'=>$categories
        ],200);
    }
    public function delete_category($id){
        $category = Category::find($id);
        $category->delete();
    }
    public function edit_category($id){
        $category = Category::find($id);
        return response()->json([
            'category'=>$category
        ],200);
    }
    public function update_category(Request $request,$id){
        $this->validate($request,[
            'title'=>'required|min:2|max:50'
        ]);
        $category = Category::find($id);
        $category->title = $request->title;
        $category->save();
    }


    
}
