<?php

namespace App\Http\Controllers\Admin;

use App\Model\Rated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Image;

class RatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = Rated::all();
        return view('admin.rate.index', compact('rates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rate.create');
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
            $destinationPath    = 'uploads/rated/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }

        $rated               =   new Rated();
        $rated->title  =   $request->input('title');
        $rated->description  =   $request->input('description');
        $rated->image        =   $name;
        if($rated->save()){
            return redirect('rate/view')->with('success','Rated Data Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding data.');
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
        $rate = Rated::find($id);
        return view('admin.rate.show', compact('rate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rate = Rated::find($id);
        return view('admin.rate.edit', compact('rate'));
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
        $rate = Rated::find($id);

        if($request->hasFile('image')) {
            File::delete('uploads/rated'.'/'.$rate->image);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/rated/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $rate->image;
        }

        $rate->title  =   $request->input('title');
        $rate->description  =   $request->input('description');
        $rate->image        =   $name;
        if($rate->save()){
            return redirect('rate/view')->with('success','Rated Data Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating rated.');
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
        $rate = Rated::find($id);
        $image = $rate->image;
        if($rate->delete()){
            File::delete('uploads/rated'.'/'.$image);
            return redirect()->back()->with('error', 'Rated Data Deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Rated Data Could not be Deleted at this moment.');
        }
    }

    public function enableRated($id)
    {
        $rate = Rated::find($id);
        $rate->enabled = 1;
        $rate->save();
        return redirect()->back()->with('success', 'Data Enabled Successfully');
    }

    public function disableRated($id)
    {
        $rate = Rated::find($id);
        $rate->enabled = 0;
        $rate->save();
        return redirect()->back()->with('success', 'Data Disabled Successfully');
    }
}
