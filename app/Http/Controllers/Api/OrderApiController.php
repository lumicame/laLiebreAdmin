<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Order;
use App\OrderProduct;
use App\User;


class OrderApiController extends Controller
{

		public function index($id,Request $request)
    {
    	$user =User::find($id);
    	if ($user->orders) {
    		foreach ($user->orders as $value) {
    			$value->products;
    			foreach($value->products as $v){
    			    $v->product;
    			}
    			
    		}
    		return $user->orders;
    	}
    	else{
    		return array('state' => "No Tienes Ordenes." );
    	}
    	
    }

    public function show($id,Request $request)
    {
    	$order =Order::find($id);
    	if ($order) {
    		$order->products;
    		foreach ($order->products as $value) {
    			$value->product;
    		}
    		return $order;
    	}
    	else{
    		return array('state' => "Esta orden no existe." );
    	}
    	
    }
    public function save($id,Request $request)
    {
    	$user =User::find($id);
    	if (count($user->carts)>0) {
    		$order=new Order();
    	$order->user_id=$user->id;
    	$order->state="pendiente";
    	$order->save();
    	$carts=$user->carts;
    	foreach ($carts as $cart) {
    		$orderproduct=new OrderProduct();
    		$orderproduct->product_id=$cart->product_id;
    		$orderproduct->order_id=$order->id;
    		$orderproduct->quantity=$cart->quantity;
    		$orderproduct->save();
    		$cart->delete();
    		}
    		$order->products;
    		return $order;
    	}
    	else{
    		return array('state' => "No hay productos en el carrito." );
    	}
    	
    }
}
