<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
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
        $types=Type::all();
        return view('type.index',compact('types'));
    }
    public function save(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $type=new Type();
        $type->name=$request->name;
        $type->save();
        if ($request->file('logo')) {
           $logo = $request->file('logo');
 
        $namea='type_logo_'.$type->id.'.'.$logo->getClientOriginalExtension();
       //obtenemos el nombre del archivo
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put('type_logo/'.$namea,  \File::get($logo));
        $type->logo=$namea;
        }
        $type->save();
        return view('type.item',compact('type'))->render();
    }
    public function show($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $type=Type::find($id);
        return $type;
    }
    public function edit($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $type=Type::find($id);
        $type->name=$request->name;
        if ($request->file('logo')) {
           $logo = $request->file('logo');
 
        $namea='type_logo_'.$type->id.'.'.$logo->getClientOriginalExtension();
       //obtenemos el nombre del archivo
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put('type_logo/'.$namea,  \File::get($logo));
        $type->logo=$namea;
        }
        $type->save();
        $type->save();
        return view('type.item',compact('type'))->render();
    }
    public function delete($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $type=Type::find($id);
        $type->delete();
        return $id;
    }
}
