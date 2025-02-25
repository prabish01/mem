<?php

namespace App\Http\Controllers\Admin;

use App\Model\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            $destinationPath    = 'uploads/slider/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }

        $slider               =   new Slider();
        $slider->title  =   $request->input('title');
        $slider->image        =   $name;
        if($slider->save()){
            return redirect('slider/view')->with('success','Slider Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding slider.');
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
        $slider = Slider::find($id);
        return view('admin.slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
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
        $slider = Slider::find($id);

        if($request->hasFile('image')) {
            File::delete('uploads/slider'.'/'.$slider->image);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/slider/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $slider->image;
        }

        $slider->title  =   $request->input('title');
        $slider->image        =   $name;
        if($slider->save()){
            return redirect('slider/view')->with('success','Slider Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating slider.');
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
        $slider = Slider::find($id);
        $image = $slider->image;
        if($slider->delete()){
            File::delete('uploads/slider'.'/'.$image);
            return redirect()->back()->with('error', 'Slider Image Deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Slider Image Could not be Deleted at this moment.');
        }
    }

    public function enableSlider($id)
    {
        $slider = Slider::find($id);
        $slider->show = 1;
        $slider->save();
        return redirect()->back()->with('success', 'Slider Image Enabled Successfully');
    }

    public function disableSlider($id)
    {
        $slider = Slider::find($id);
        $slider->show = 0;
        $slider->save();
        return redirect()->back()->with('success', 'Slider Image Disabled Successfully');
    }
}
