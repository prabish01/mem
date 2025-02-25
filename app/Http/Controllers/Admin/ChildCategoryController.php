<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Model\ChildCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childcategorys = ChildCategory::all();
        return view('admin.childcategory.index',compact('childcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.childcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'=> 'mimes:jpg,jpeg,png,gif'
        ]);
        
        $childcategory = new ChildCategory();
        $childcategory->category_id = $request->category_id;
        $childcategory->subcategory_id = $request->subcategory_id;
        $childcategory->childcategory_name = $request->childcategory_name;
      
        if($childcategory->save()){
            return redirect('childcategory/view')->with('success','Childcategory Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding childcategory.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $childcategory = ChildCategory::find($id);
        return view('admin.childcategory.show', compact('childcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $childcategory = ChildCategory::find($id);
        $categories = Category::all();
        return view('admin.childcategory.edit', compact('childcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $childcategory = ChildCategory::find($id);

       
        $childcategory->category_id = $request->category_id;
        $childcategory->subcategory_id = $request->subcategory_id;
        $childcategory->childcategory_name = $request->childcategory_name;
       
        if($childcategory->save()){
            return redirect('childcategory/view')->with('success','Childcategory Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating childcategory.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $childcategory = ChildCategory::find($id);
       
        if($childcategory->delete()){
           
            return redirect()->back()->with('error', 'Childcategory Deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Childcategory Could not be Deleted at this moment.');
        }
    }

    public function childcategory($id)
    {
        $childcategory = ChildCategory::select('*')->where('subcategory_id',$id)->get();
        return response()->json(['status'=>'success','result'=>$childcategory]);
    }
}
