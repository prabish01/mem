<?php

namespace App\Http\Controllers\Admin;

use App\Model\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;
class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.create');
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
            $destinationPath    = 'uploads/partner/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }

        $partner  =   new Partner();
        $partner->title  =   $request->input('title');
        $partner->image  =   $name;
        if($partner->save()){
            return redirect('partner/view')->with('success','Partner Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding partner.');
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
        $partner = Partner::find($id);
        return view('admin.partner.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::find($id);
        return view('admin.partner.edit', compact('partner'));
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
        $partner = Partner::find($id);
        if($request->hasFile('image')) {
            File::delete('uploads/partner'.'/'.$partner->image);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/partner/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $partner->image;
        }
        $partner->title  =   $request->input('title');
        $partner->image  =   $name;
        if($partner->save()){
            return redirect('partner/view')->with('success','Partner Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating partner.');
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
        $partner = Partner::find($id);
        $image = $partner->image;
        if($partner->delete()){
            File::delete('uploads/partner'.'/'.$image);
            return redirect()->back()->with('error', 'Rated Data Deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Rated Data Could not be Deleted at this moment.');
        }
    }
}
