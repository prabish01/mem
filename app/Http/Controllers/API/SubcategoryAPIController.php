<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
  
use App\Model\SubCategory;
use Illuminate\Http\Request;

class SubCategoryAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SubCategory::all();
    }
  
    public function show($id)
    {
        return SubCategory::find($id);
    }
    
    public function showSubCategoryfromCategory($categoryId)
    {
        return SubCategory::where('category_id' ,$categoryId)->get();
    }
 
}
