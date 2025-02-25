<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/category/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }

        $category               =   new Category();
        $category->category_name  =   $request->input('category_name');
        $category->created_by  =   $request->input('created_by');
        $category->image        =   $name;
        if($category->save()){
            return redirect('category/view')->with('success','Category Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding category.');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
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
        $category = Category::find($id);

        if($request->hasFile('image')) {
            File::delete('uploads/category'.'/'.$category->image);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/category/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $category->image;
        }

        $category->category_name  =   $request->input('category_name');
        $category->created_by  =   $request->input('created_by');
        $category->image        =   $name;
        if($category->save()){
            return redirect('category/view')->with('success','Category Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating category.');
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
        $category = Category::find($id);
        $image = $category->image;
        if($category->delete()){
            File::delete('uploads/category'.'/'.$image);
            return redirect()->back()->with('error', 'Category Deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Category Could not be Deleted at this moment.');
        }
    }
}
