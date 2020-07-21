<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryApiController extends Controller
{
     public function index(Request $request)
    {
        $categories=Category::all();
        return $categories;
    }
}
