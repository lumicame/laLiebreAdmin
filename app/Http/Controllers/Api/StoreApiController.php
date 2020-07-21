<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Store;
use App\Type;

class StoreApiController extends Controller
{
     public function index($id,Request $request)
    {
    	$types=Type::where('state',null)->get();
        
        foreach ($types as $type) {
        	$type->stores()->where('district_id',$id)->get();
        }
        return $types;
    }

    public function show($id,Request $request)
    {
    	$types=Type::find($id);
        $types->stores;
        return $types;
    }

    public function products($id,Request $request)
    {
    	$store=Store::find($id);
    	$store->categories;
    	if ($store->categories) {
    		foreach ($store->categories as $category) {
    			$category->products;
    		}
    	}
        
        return $store;
    }
}
