<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Model\Blog;
use Illuminate\Http\Request;

class BlogAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Blog::all();
    }
  
    public function show($id)
    {
        return Blog::find($id);
    }
 
}
