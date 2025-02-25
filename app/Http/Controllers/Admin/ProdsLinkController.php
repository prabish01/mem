<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Prods;
use App\Model\ProdsLink; 
use Image;
use File;

class ProdslinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodslinks  = ProdsLink::all();
        return view('admin.prodslink.index', compact('prodslinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $prodss = Prods::all();
        return view('admin.prodslink.create',compact('categories','prodss'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $prodslink               =   new prodslink();
        $prodslink->title  =   $request->input('title');   
        $prodslink->category_id  = $request->input('category_id'); 
        $prodslink->prods_id  = $request->input('prods_id');
      
        $this->validate($request, [
            'filename' =>  'mimes:jpg,jpeg,png,gif',
            'title' => 'required',  
            'category_id' => 'required',  
        ]);  
        if ($request->hasFile('filename')) {
            $image              = $request->file('filename');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               =    time().substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6)  .'.'. $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/prodslink/';
            if (!File::exists($destinationPath)) File::makeDirectory($destinationPath, 777);
            $ImageUpload->save($destinationPath . $name);
        } else {
            $name = '';
        } 
        $prodslink->filename  =  $name;
        $result = $prodslink->save();  

        if ($result) {
            return redirect('prodslink/view')->with('success', 'New Product Link Added Successfully.');
        } else {
            return redirect()->back()->with('error', 'Something is missing while adding prodslink.');
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
        $prodslink = ProdsLink::find($id);
        $categoryid =$prodslink->category_id; 
        $prods_id =$prodslink->prods_id; 
        $category = Category::find( $categoryid);
        $prods= Prods::find($prods_id);
        return view('admin.prodslink.show', compact('prodslink','prods','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodslink = ProdsLink::find($id);  
         return view('admin.prodslink.edit', compact('prodslink'));
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

        $prodslink = ProdsLink::find($id);  
        $prodslink->title  =   $request->input('title');   
        $prodslink->category_id  = $request->input('category_id'); 
        $prodslink->prods_id  = $request->input('prods_id');
        $this->validate($request, [
            'filename' =>  'mimes:jpg,jpeg,png,gif',
            'title' => 'required',  
        ]);  
        if ($request->hasFile('filename')) {
            File::delete('uploads/prodslink' . '/' . $prodslink->filename);
            $image              = $request->file('filename');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               =    substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6)  .'.'. $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/prodslink/';
            if (!File::exists($destinationPath)) File::makeDirectory($destinationPath, 777);
            $ImageUpload->save($destinationPath . $name);
        } else {
            $name = $prodslink->filename;
        } 
        $prodslink->filename        =   $name;

         
        if ($prodslink->save()) {
            return redirect('prodslink/view')->with('success', 'Product Updated Successfully.');
        } else {
            return redirect()->back()->with('error', 'Something is missing while updating prodslink.');
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
        $prodslink = ProdsLink::find($id); 
        $image = $prodslink->filename;  
        File::delete('uploads/prodslink'.'/'.$image);
        $result = $prodslink->delete(); 

        if ($result) {  
            return redirect()->back()->with('error', 'prodslink Image Deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'prodslink Image Could not be Deleted at this moment.');
        }
    }
}
