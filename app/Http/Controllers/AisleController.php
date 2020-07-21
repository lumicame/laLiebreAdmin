<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aisle;

class AisleController extends Controller
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
        return view('aisle.index',compact('aisles'));
    }
    public function save(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $aisle=new Aisle();
        $aisle->name=$request->name;
        $aisle->save();
        return view('aisle.item',compact('aisle'))->render();
    }
    public function show($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $aisle=Aisle::find($id);
        return $aisle;
    }
    public function edit($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $aisle=Aisle::find($id);
        $aisle->name=$request->name;
        $aisle->save();
        return view('aisle.item',compact('aisle'))->render();
    }
    public function delete($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $aisle=Aisle::find($id);
        $aisle->delete();
        return $id;
    }
}
