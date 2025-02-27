<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Prods;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodss  = Prods::all();
        return view('admin.prods.index', compact('prodss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prods = new Prods();
        $prods->prods_title = $request->input('prods_title');
        $prods->prods_description = $request->input('prods_description');

        $this->validate($request, [
            'prods_image' =>  'mimes:jpg,jpeg,png,gif',
            'prods_title' => 'required|unique:prods',
            'prods_description' => 'required',
        ]);

        if ($request->hasFile('prods_image')) {
            $image = $request->file('prods_image');
            $name = time() . substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6) . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'uploads/prods/';

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 777, true);
            }

            // Create optimized version
            $ImageUpload = Image::make($image);

            // Resize maintaining aspect ratio
            if ($ImageUpload->width() > 1200) {
                $ImageUpload->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }

            // Optimize quality
            $ImageUpload->encode($image->getClientOriginalExtension(), 85);
            $ImageUpload->save($destinationPath . $name);

            // Create WebP version
            $webpName = pathinfo($name, PATHINFO_FILENAME) . '.webp';
            $ImageUpload->encode('webp', 85)->save($destinationPath . $webpName);
        } else {
            $name = '';
        }

        $prods->prods_image = $name;
        $result = $prods->save();

        if ($result) {
            return redirect('prods/view')->with('success', 'Product Added Successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong while adding product.');
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
        $prods = Prods::find($id);
        return view('admin.prods.show', compact('prods'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prods = Prods::find($id);
        return view('admin.prods.edit', compact('prods'));
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
        $prods = Prods::find($id);

        $prods->prods_title = $request->input('prods_title');
        $prods->prods_description = $request->input('prods_description');

        $this->validate($request, [
            'prods_image' =>  'mimes:jpg,jpeg,png,gif',
            'prods_title' => 'required',
            'prods_description' => 'required',
        ]);

        if ($request->hasFile('prods_image')) {
            // Delete old images
            $oldImage = $prods->prods_image;
            if ($oldImage) {
                File::delete('uploads/prods/' . $oldImage);
                File::delete('uploads/prods/' . pathinfo($oldImage, PATHINFO_FILENAME) . '.webp');
            }

            $image = $request->file('prods_image');
            $name = time() . substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6) . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'uploads/prods/';

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 777, true);
            }

            // Create optimized version
            $ImageUpload = Image::make($image);

            // Resize maintaining aspect ratio
            if ($ImageUpload->width() > 1200) {
                $ImageUpload->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }

            // Optimize quality
            $ImageUpload->encode($image->getClientOriginalExtension(), 85);
            $ImageUpload->save($destinationPath . $name);

            // Create WebP version
            $webpName = pathinfo($name, PATHINFO_FILENAME) . '.webp';
            $ImageUpload->encode('webp', 85)->save($destinationPath . $webpName);
        } else {
            $name = $prods->prods_image;
        }

        $prods->prods_image = $name;

        if ($prods->save()) {
            return redirect('prods/view')->with('success', 'Product Updated Successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong while updating product.');
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
        $prods = prods::find($id);
        $image = $prods->prods_image;
        File::delete('uploads/product' . '/' . $image);
        $result = $prods->delete();

        if ($result) {
            return redirect()->back()->with('error', 'prods Image Deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'prods Image Could not be Deleted at this moment.');
        }
    }
}
