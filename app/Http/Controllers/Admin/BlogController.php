<?php

namespace App\Http\Controllers\Admin;

use App\Model\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id','desc')->get();
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            $destinationPath    = 'uploads/blog/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $blog               =   new Blog();
        $blog->title  =   $request->input('title');
        $blog->blog_date  =   $request->input('blog_date');
        $blog->description  =   $request->input('description');
        $blog->image        =   $name;
        if($blog->save()){
            return redirect('blog/view')->with('success','BLog Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding blog.');
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
        $blog = Blog::find($id);
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog'));
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
        $blog = Blog::find($id);
        if($request->hasFile('image')) {
            File::delete('uploads/blog'.'/'.$blog->image);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/blog/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $blog->image;
        }
        $blog->title  =   $request->input('title');
        $blog->blog_date  =   $request->input('blog_date');
        $blog->description  =   $request->input('description');
        $blog->image        =   $name;
        if($blog->save()){
            return redirect('blog/view')->with('success','BLog Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating blog.');
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
        $blog = Blog::find($id);
        $image = $blog->image;
        if($blog->delete()){
            File::delete('uploads/blog'.'/'.$image);
            return redirect()->back()->with('error', 'Blog Deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Blog Could not be Deleted at this moment.');
        }
    }
}
