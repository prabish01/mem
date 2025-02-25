<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
 
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::all();
    }
  
    public function show($id)
    {
        return Category::find($id);
    }
 
}
