<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class UserApiController extends Controller
{
    public function save(Request $request)
    {
        $role = Role::where('name','client')->first();
        $user=new User();
        $user->name=$request->name;
        $user->api_token = Str::random(60);
        $user->email = $request->email;
        $user->number= $request->number;
        $user->password = bcrypt($request->password);
        $user->save();
        $user->roles()->attach($role);
        return $user;
    }

     public function show(Request $request)
    {
        $role = Role::where('name','client')->first();
       
        return $role->users;
    }

    public function verify($id,Request $request)
    {
    	$user =User::where('number',$id)->first();
    	if ($user) {
    		$user->state="OK";
        return $user;
    	}else{
 			return array('state' => 'ERROR' );
    	}
    	
    }
}
