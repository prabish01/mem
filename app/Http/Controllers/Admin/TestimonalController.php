<?php

namespace App\Http\Controllers\Admin;

use App\Model\Testimonal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Image;

class TestimonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonals = Testimonal::orderBy('id','desc')->get();
        return view('admin.testimonal.index', compact('testimonals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonal.create');
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
            'testimonal_image'=> 'mimes:jpg,jpeg,png,gif'
        ]);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/testimonal/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $testimonal = new Testimonal();
        $testimonal->title  =   $request->input('title');
        $testimonal->position  =   $request->input('position');
        $testimonal->rating  =   $request->input('rating');
        $testimonal->description  =   $request->input('description');
        $testimonal->image        =   $name;
        if($testimonal->save()){
            return redirect('testimonal/view')->with('success','Testimonal Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding testimonal.');
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
        $testimonal = Testimonal::find($id);
        return view('admin.testimonal.show', compact('testimonal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonal = Testimonal::find($id);
        return view('admin.testimonal.edit', compact('testimonal'));
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
        $testimonal = Testimonal::find($id);

        if($request->hasFile('image')) {
            File::delete('uploads/testimonal'.'/'.$testimonal->image);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/testimonal/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $testimonal->image;
        }
        $testimonal->title  =   $request->input('title');
        $testimonal->position  =   $request->input('position');
        $testimonal->rating  =   $request->input('rating');
        $testimonal->description  =   $request->input('description');
        $testimonal->image        =   $name;
        if($testimonal->save()){
            return redirect('testimonal/view')->with('success','Testimonal Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating testimonal.');
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
        $testimonal = Testimonal::find($id);
        $image = $testimonal->image;
        if($testimonal->delete()){
            File::delete('uploads/testimonal'.'/'.$image);
            return redirect()->back()->with('error', 'Testimonal Deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Testimonal Could not be Deleted at this moment.');
        }
    }
}
