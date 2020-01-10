<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Cart;
use DB;
use Session;
use Auth;

class CartController extends Controller
{
    public function addtocart($id){

    	//insert user id or session
    	if(empty(Auth::user()->email)){
            $user_email = '';    
        }else{
            $user_email = Auth::user()->email;
        }

        $session_id = Session::get('session_id');


        if(!isset($session_id)){
            $session_id = str_random(40);
            Session::put('session_id',$session_id);
        }

        $count = DB::table('carts')->where(['item_id' => $id,'session_id' => $session_id])->count();

        if($count>0){
            return "Item already exist in Cart";
        }



    	$item = Item::find($id);

    	$cart = new Cart();


    	$cart->item_id = $id;
    	$cart->title = $item->title;
    	$cart->price = $item->price;
    	$cart->user_email = $user_email;
    	$cart->session_id = $session_id;
    	$cart->save();

    	return "Item added to cart successfully";
    }
}
