<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Model\ChildCategory; 

class ChildCategoryAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ChildCategory::all();
    }
  
    public function show($id)
    {
        return ChildCategory::find($id);
    }
    
    public function showchildCategoryfromCategory($categoryId)
    {
        return ChildCategory::where('category_id' ,$categoryId)->get();
    }
    
    public function showchildCategoryfromSubCategory($categoryId)
    {
        return ChildCategory::where('subcategory_id' ,$categoryId)->get();
    }
 
}
