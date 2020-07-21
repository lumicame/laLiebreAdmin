<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Aisle;
use App\Store;

class CategoryController extends Controller
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
        $aisles=Aisle::all();
        $categories=null;
        if ($aisles->first()) {
            $categories = $aisles->first()->categories;
        }
        
        return view('category.index',compact('categories','aisles'));
    }
    public function save(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $category=new Category();
        $category->aisle_id=$request->aisle;
        $category->name=$request->name;
        $category->save();
        return view('category.item',compact('category'))->render();
    }
    public function show($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $category=Category::find($id);
        return $category;
    }
    public function edit($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $category=Category::find($id);
        $category->name=$request->name;
        $category->save();
        return view('category.item',compact('category'))->render();
    }
    public function delete($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $category=Category::find($id);
        $category->delete();
        return $id;
    }
    public function search($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $aisles=Aisle::find($id);
        $categories = $aisles->categories;
        $view="";
        foreach ($categories as $category) {
           $view=$view.view('category.item',compact('category'))->render();
        }

        return $view;
    }




        ////////////////////////////////////////////////
    /////////////TIENDAS////////////////////



     public function indexStore(Request $request)
    {
        $request->user()->authorizeRoles(['admin','store']);
        if ($request->user()->hasRole('store')) {
            $store=$request->user()->store;
            $categories=null;
        if ($store) {
            $categories = $store->categories;
        }
        
        return view('category.store.index',compact('categories','store'));
        }else {
           $stores=Store::all();
            $categories=null;
        if ($stores->first()) {
            $categories = $stores->first()->categories;
        }
        
        return view('category.store.index',compact('categories','stores'));
        }
        
    }
    public function saveStore(Request $request)
    {
        $request->user()->authorizeRoles(['admin','store']);
        $category=new Category();
        $category->store_id=$request->store;
        $category->name=$request->name;
        $category->save();
        return view('category.store.item',compact('category'))->render();
    }
    public function showStore($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin','store']);
        $category=Category::find($id);
        return $category;
    }
    public function editStore($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin','store']);
        $category=Category::find($id);
        $category->name=$request->name;
        $category->save();
        return view('category.store.item',compact('category'))->render();
    }
    public function deleteStore($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin','store']);
        $category=Category::find($id);
        $category->delete();
        return $id;
    }
    public function searchStore($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $store=Store::find($id);
        $categories = $store->categories;
        $view="";
        foreach ($categories as $category) {
           $view=$view.view('category.store.item',compact('category'))->render();
        }

        return $view;
    }
}
