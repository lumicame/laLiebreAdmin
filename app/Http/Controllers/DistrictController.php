<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;

class DistrictController extends Controller
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
        $districts=District::all();
        return view('district.index',compact('districts'));
    }
    public function save(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $district=new District();
        $district->name=$request->name;
        $district->save();
        return view('district.item',compact('district'))->render();
    }
    public function show($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $district=District::find($id);
        return $district;
    }
    public function edit($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $district=District::find($id);
        $district->name=$request->name;
        $district->save();
        return view('district.item',compact('district'))->render();
    }
    public function delete($id,Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $district=District::find($id);
        $district->delete();
        return $id;
    }
}
