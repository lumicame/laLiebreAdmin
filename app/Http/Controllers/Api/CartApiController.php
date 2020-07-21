<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Cart;

class CartApiController extends Controller
{
     public function index($id,Request $request)
    {
    	$user =User::find($id);
    	if ($user) {
    		foreach ($user->carts as $value) {
        	$value->product;
        	}
        	return $user->carts;
    	}
        else{
            return array('state' => "Tu Carrito esta vacio." );
        }
       
        
    }

     public function save($id,Request $request)
    {
    	$user =User::find($id);
    	$c=Cart::where('user_id',$id)->where('product_id',$request->product)->first();
    	if ($c) {
    		$c->quantity=$request->quantity;
    		$c->save();

    		foreach ($user->carts as $value) {
        	$value->product;
        	}
    		return $user->carts;
    	}else{
    		 $cart=new Cart();
    		 $cart->user_id=$user->id;
    		 $cart->product_id=$request->product;
    		 $cart->quantity=$request->quantity;
    		 $cart->save();
    		 foreach ($user->carts as $value) {
        	$value->product;
        	}
        	return $user->carts;
    	}
    }


public function delete($id,Request $request)
    {
    	$user =User::find($id);
    	$c=Cart::find($request->cart);
    	$c->delete();
    	foreach ($user->carts as $value) {
        	$value->product;
        	}
        return $user->carts;
    }

}
