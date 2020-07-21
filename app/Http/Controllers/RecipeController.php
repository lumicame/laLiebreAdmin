<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\RecipeCategory;
use App\Product;
use App\RecipeProduct;

class RecipeController extends Controller
{
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        
        $categories=RecipeCategory::where('category_id',null)->get();
        $subs=null;
        $recipe=null;
        if ($categories->first()) {
        	$subs=RecipeCategory::where('category_id',$categories->first()->id)->get();
        }
        if ($subs) {
        	$recipes=Recipe::where('recipe_category_id',$subs->first()->id)->get();
        }
        
        return view('recipe.index',compact('categories','subs','recipes'));
    }

 	public function indexSave($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        
        $sub=RecipeCategory::find($id);
        $category=RecipeCategory::find($sub->category_id);
        $products=Product::where('store_id',1)->get();
        
        return view('recipe.save.index',compact('category','sub','products'));
    }

    public function search($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $subs=RecipeCategory::where('category_id',$id)->get();
        
        

        return view('recipe.category.list',compact('subs'))->render();
    }
    public function searchSub($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $sub=RecipeCategory::find($id);
        $recipes=$sub->recipes;
        

        return view('recipe.list',compact('recipes'))->render();
    }

     public function searchProduct(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        define('STRING', $request->text);
        $products=Product::where('store_id',1)->where(function ($q)
        {
            $q->where('name', 'like', '%'.STRING.'%')->orWhere('code', 'like', '%'.STRING.'%');
        })->take(5)->get();
        $view="";
        if ($products->first()) {
            foreach ($products as $product) {
            $view=$view.view('recipe.save.item')->with('product',$product)->render();
        }
        } else {
           $view="ERROR";
        }
        
        return response()->json($view);

    }

    public function selectProduct(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $product=Product::find($request->id);
        $view="";
        if ($product) {
            $view=view('recipe.save.tr')->with('product',$product)->render();
        }else{
            $view="ERROR";
        }
        $product->data=$view;
       return response()->json($product);
    }
    public function recipeSave($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $product=Product::find($request->id);
        $view="";
        if ($product) {
            $view=view('recipe.save.tr')->with('product',$product)->render();
        }else{
            $view="ERROR";
        }
        $product->data=$view;
       return response()->json($product);
    }
}
