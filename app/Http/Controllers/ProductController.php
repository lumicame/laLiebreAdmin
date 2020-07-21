<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Store;
use App\Provider;


class ProductController extends Controller
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
        $stores=Store::all();
        $categories=Category::where('store_id',null)->get();
        $providers=Provider::all();
        
        $products=null;
        if ($categories->first()) {
            $products = $categories->first()->products;
        }
        return view('product.index',compact('products','stores','categories','providers'));
    }

    public function show($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $products=Product::find($id);
        return $products;
    }

    public function save(Request $request)
    {
         //obtenemos el campo file definido en el formulario
        $product = new Product();
        $product->name=$request->name;
        $product->code=$request->code;
        $product->description=$request->description;
        $product->category_id=$request->category;
        $product->store_id=$request->store;
		$product->unit=$request->unit;
		$product->weight=$request->weight;
		$product->price=$request->price;
        $product->provider_id=$request->provider;
        $product->save();

       $logo = $request->file('img');
 
        $namea='prodcut_img_'.$product->id.'.'.$logo->getClientOriginalExtension();
       //obtenemos el nombre del archivo
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put('product_img/'.$namea,  \File::get($logo));
        $product->photo=$namea;
        $product->save();

       return view('product.item',compact('product'))->render();
    }

    public function edit($id,Request $request)
    {
         //obtenemos el campo file definido en el formulario
        $product = Product::find($id);
        $product->name=$request->name;
        $product->code=$request->code;
        $product->description=$request->description;
        $product->category_id=$request->category;
        $product->store_id=$request->store;
        $product->unit=$request->unit;
        $product->weight=$request->weight;
        $product->price=$request->price;
        $product->provider_id=$request->provider;
        if ($request->file('img')) {
              $logo = $request->file('img');
 
        $namea='prodcut_img_'.$product->id.'.'.$logo->getClientOriginalExtension();
       //obtenemos el nombre del archivo
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put('product_img/'.$namea,  \File::get($logo));
        $product->photo=$namea;
            }
       	
        $product->save();

       return view('product.item',compact('product'))->render();
    }
    public function search($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $category=Category::find($id);
        $products = $category->products;
        

        return view('product.list',compact('products'))->render();;
    }

public function delete($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $product = Product::find($id);
        $product->delete();
        
        

        return $product;
    }

    ////////////////////////////////////////////////
    /////////////TIENDAS////////////////////


    public function indexStore(Request $request)
    {
        $request->user()->authorizeRoles(['admin','store']);
        if ($request->user()->hasRole('store')) {
            $store=$request->user()->store;
        $categories=$store->categories;
        
        $products=null;
        if ($categories->first()) {
            $products = $categories->first()->products;
        }
        return view('product.store.index',compact('products','store','categories'));
        }
        else{
            return 404;
        }
        
    }

    public function showStore($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $products=Product::find($id);
        return $products;
    }

    public function saveStore(Request $request)
    {
         $request->user()->authorizeRoles(['admin','store']);
        $product = new Product();
        $product->name=$request->name;
        $product->code=$request->code;
        $product->description=$request->description;
        $product->category_id=$request->category;
        $product->store_id= $request->user()->store->id;
        $product->unit=$request->unit;
        $product->weight=$request->weight;
        $product->price=$request->price;
        $product->save();

       $logo = $request->file('img');
 
        $namea='prodcut_img_'.$product->id.'.'.$logo->getClientOriginalExtension();
       //obtenemos el nombre del archivo
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put('product_img/'.$namea,  \File::get($logo));
        $product->photo=$namea;
        $product->save();

       return view('product.store.item',compact('product'))->render();
    }

    public function editStore($id,Request $request)
    {
         $request->user()->authorizeRoles(['admin','store']);
        $product = Product::find($id);
        $product->name=$request->name;
        $product->code=$request->code;
        $product->description=$request->description;
        $product->category_id=$request->category;
        $product->unit=$request->unit;
        $product->weight=$request->weight;
        $product->price=$request->price;
        if ($request->file('img')) {
              $logo = $request->file('img');
 
        $namea='product_img_'.$product->id.'.'.$logo->getClientOriginalExtension();
       //obtenemos el nombre del archivo
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put('product_img/'.$namea,  \File::get($logo));
        $product->photo=$namea;
            }
        
        $product->save();

       return view('product.item',compact('product'))->render();
    }
    public function searchStore($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $category=Category::find($id);
        $products = $category->products;
        

        return view('product.list',compact('products'))->render();;
    }

public function deleteStore($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $product = Product::find($id);
        $product->delete();
        
        

        return $product;
    }

}
