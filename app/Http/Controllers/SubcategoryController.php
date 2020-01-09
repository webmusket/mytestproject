<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;

class SubcategoryController extends Controller
{
    public function all_subcategory(){
       $subcategories = Subcategory::with('category')->orderBy('id','desc')->get();
       return response()->json([
           'subcategories'=>$subcategories
       ],200);
    }
    public function save_subcategory(Request $request){
        $this->validate($request,[
            'title'=>'required|min:2|max:50',
        ]);

        $subcategory = new Subcategory();
        $subcategory->title = $request->title;
        $subcategory->cat_id = $request->cat_id;
        $subcategory->save();
    }
    public function delete_subcategory($id){
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
    }
    public function edit_subcategory($id){
        $subcategory = Subcategory::find($id);
        return response()->json([
            'subcategory'=>$subcategory
        ],200);
    }
    public function update_subcategory(Request $request, $id){
        $subcategory = Subcategory::find($id);
        $this->validate($request,[
            'title'=>'required|min:2|max:50',
        ]);

        $subcategory->title = $request->title;
        $subcategory->cat_id = $request->cat_id;
        $subcategory->save();
    }
}
