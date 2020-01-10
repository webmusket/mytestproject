<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Cart;
use DB;
use Session;
use Auth;
use App\Order;

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

    public function gotocart(){
    	if(Auth::check()){
            $user_email = Auth::user()->email;
            $userCart = DB::table('carts')->where(['user_email' => $user_email])->get();     
        }else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('carts')->where(['session_id' => $session_id])->get();    
        }

        return response()->json([
           'userCart'=>$userCart
        ],200);
    }

    public function deletecart($id){
    	$item = Cart::find($id);
        $item->delete();
    }

    public function checkout(){
    	if(Auth::check()){


    		$user_data = Auth::user();
    		//$user_data = App\User::find($user_id);

 

            $user_email = Auth::user()->email;
            $order_data = DB::table('carts')->where(['user_email' => $user_email])->get(); 
            $order_count = DB::table('carts')->where(['user_email' => $user_email])->count();

            if ($order_count < 1) {
                return ['message'=>'There is no product in this cart'];
            }    

	        $order = new Order();

	        $order->user_data = $user_data;
	        $order->order_data = $order_data;
	    

	        if ($order->save()) {
	        	$order_data = DB::table('carts')->where(['user_email' => $user_email])->delete();
	        }
            return ['message'=>'Order Placed successfully'];

    	}else{
            return ['message'=>'You have to login to checkout'];
    	}
    }
}
