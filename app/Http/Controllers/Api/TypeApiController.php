<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;

class TypeApiController extends Controller
{
    public function index(Request $request)
    {
    	$types=Type::all();
        return $types;
    }
}
