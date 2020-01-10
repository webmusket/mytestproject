<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function getallorders(){
    	$orders = Order::orderBy('id', 'DESC')->get();

    	return response()->json([
           'orders'=>$orders
       ],200);
    }

    public function deleteorder($id){
    	$item = Order::find($id);
        $item->delete();
        return ['message'=>'Order Deleted'];
    }
}
