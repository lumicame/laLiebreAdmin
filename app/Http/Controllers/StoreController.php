<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\District;
use App\Type;
use App\User;
use App\Role;

class StoreController extends Controller
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
        $districts=District::all();
        $types=Type::all();
        return view('store.index',compact('stores','districts','types'));
    }
    public function show($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $store=Store::find($id);
        return $store;
    }
    public function save(Request $request)
    {
         //obtenemos el campo file definido en el formulario
        $store = new Store();
        $user =new User();
        $role = Role::where('name','store')->first();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->pass);
        $user->save();
        $user->roles()->attach($role);
        $store->name=$request->name;
        $store->description=$request->description;
        $store->district_id=$request->district;
        $store->type_id=$request->type;
        $store->user_id=$user->id;
        $store->save();

       $logo = $request->file('logo');
 
        $namea='store_logo_'.$store->id.'.'.$logo->getClientOriginalExtension();
       //obtenemos el nombre del archivo
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put('store_logo/'.$namea,  \File::get($logo));
        $store->logo=$namea;
        $store->save();

       return view('store.item',compact('store'))->render();
    }

    public function edit($id,Request $request)
    {
         //obtenemos el campo file definido en el formulario
        $store = Store::find($id);
        if ($store->user) {
            $user=$store->user;
        }
        else{
            
           $user =new User();
        }
        
         $user->name=$request->name;
        $user->email=$request->email;
        if ($request->pass) {
            $user->password=bcrypt($request->pass);
        }
        $user->save();
        if (!$store->user) {
           $role = Role::where('name','store')->first();
           $user->roles()->attach($role);
           $store->user_id=$user->id;
        }
        $store->name=$request->name;
        $store->description=$request->description;
        $store->district_id=$request->district;
        $store->type_id=$request->type;
        if ($request->file('logo')) {
           $logo = $request->file('logo');
 
        $namea='store_logo_'.$store->id.'.'.$logo->getClientOriginalExtension();
       //obtenemos el nombre del archivo
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put('store_logo/'.$namea,  \File::get($logo));
        $store->logo=$namea;
        }
       	
        $store->save();

       return view('store.item',compact('store'))->render();
    }
     public function delete($id,Request $request)
    {
         //obtenemos el campo file definido en el formulario
        $store = Store::find($id);
        if($store->categories){
            foreach($store->categories as $category){
                $category->delete();
            }
        }
        $user=User::find($store->user_id);
        $user->delete();
        \Storage::disk('local')->delete('store_logo/'.$store->logo);
        $store->delete();
       return $id;
    }

}
