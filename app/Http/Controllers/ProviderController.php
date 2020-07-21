<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;

class ProviderController extends Controller
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
        $providers=Provider::all();
        
        return view('provider.index',compact('providers'));
    }
    public function save(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $provider=new Provider();
        $provider->name=$request->name;
        $provider->location=$request->location;
        $provider->phone=$request->phone;
        $provider->save();
        return view('provider.item',compact('provider'))->render();
    }
    public function show($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $provider=Provider::find($id);
        return $provider;
    }
    public function edit($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $provider=Provider::find($id);
        $provider->name=$request->name;
        $provider->location=$request->location;
        $provider->phone=$request->phone;
        $provider->save();
        return view('provider.item',compact('provider'))->render();
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
    
}
