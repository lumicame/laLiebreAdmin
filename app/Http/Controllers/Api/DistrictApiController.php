<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\District;

class DistrictApiController extends Controller
{
   public function index(Request $request)
    {
        $districts=District::all();
        
        return $districts;
    }
}
