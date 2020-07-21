<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecipeCategory;

class RecipeCategoryController extends Controller
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
        if ($categories->first()) {
        	$subs=RecipeCategory::where('category_id',$categories->first()->id)->get();
        }
        
        
        return view('recipe.category.index',compact('categories','subs'));
    }

    public function saveCategory(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $category=new RecipeCategory();
        $category->name=$request->name;
        $category->save();
       	 $categories=RecipeCategory::where('category_id',null)->get();
        return view('recipe.category.select',compact('categories'))->render();
    }

    public function saveSub(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $sub=new RecipeCategory();
        $sub->name=$request->name;
        $sub->category_id=$request->category;
        $sub->save();
        
        
        return view('recipe.category.item',compact('sub'));
    }

    public function search($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $subs=RecipeCategory::where('category_id',$id)->get();
        
        

        return view('recipe.category.list',compact('subs'))->render();
    }
    public function show($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $sub=RecipeCategory::find($id);
        
        return $sub;
    }
    public function edit($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $sub=RecipeCategory::find($id);
        $sub->name=$request->name;
        $sub->save();
        return view('recipe.category.item',compact('sub'))->render();
    }
    public function delete($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $sub=RecipeCategory::find($id);
        $sub->delete();

        return $sub;
    }

}
