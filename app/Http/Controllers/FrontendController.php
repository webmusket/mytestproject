<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Subcategory;

class FrontendController extends Controller
{
	public function admin()
    {
        return view('admin.index');
    }

    
    public function all_item($slug = null){
    	$subcat_id = Subcategory::where('slug',$slug)->first()->id;
    	$itemsbycat = Item::where('subcat_id',$subcat_id)->get();
        return response()->json([
            'itembycat'=> $itemsbycat
        ],200);
    }
}
