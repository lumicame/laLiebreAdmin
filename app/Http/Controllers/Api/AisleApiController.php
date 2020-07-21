<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aisle;

class AisleApiController extends Controller
{
    public function index(Request $request)
    {
        $aisles=Aisle::all();
        return $aisles;
    }
}
