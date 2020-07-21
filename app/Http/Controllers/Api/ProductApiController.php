<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Aisle;
use App\Product;

class ProductApiController extends Controller
{
    public function index($id,Request $request)
    {
        $aisle=Aisle::find($id);
        $categories=$aisle->categories;
        $categori=null;
        foreach ($categories as $category) {
        	if ($category->products()->count()>0) {
        		$category->products;
        	}
        	
        }
        
        return $categories;
    }

    public function show($id,Request $request)
    {
        $product=Product::find($id);
        
        return $product;
    }
}
