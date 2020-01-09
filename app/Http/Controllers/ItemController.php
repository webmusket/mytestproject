<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Item;

class ItemController extends Controller
{
    public function all_item(){
       $items = Item::with('subcategory')->orderBy('id','desc')->get();
       return response()->json([
           'items'=>$items
       ],200);
    }
    public function save_item(Request $request){
        $this->validate($request,[
            'title'=>'required|min:2|max:50',
        ]);

        $item = new Item();
        $item->title = $request->title;
        $item->price = $request->price;
        $item->subcat_id = $request->subcat_id;
        $item->save();
    }
    public function delete_item($id){
        $item = Item::find($id);
        $item->delete();
    }
    public function edit_item($id){
        $item = Item::find($id);
        return response()->json([
            'item'=>$item
        ],200);
    }
    public function update_item(Request $request, $id){
        $item = Item::find($id);
        $this->validate($request,[
            'title'=>'required|min:2|max:50',
            'price'=>'required',
        ]);

        $item->title = $request->title;
        $item->price = $request->price;
        $item->subcat_id = $request->subcat_id;
        $item->save();
    }
}
