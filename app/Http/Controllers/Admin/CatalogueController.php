<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Catalogue;
use App\Model\CataloguePages;
use Image;
use File;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogues = Catalogue::all();
        return view('admin.catalogue.index', compact('catalogues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalogue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Catalogue               =   new Catalogue();
        $Catalogue->catalogue_title  =   $request->input('catalogue_title'); 
        $this->validate($request, [
            'image' => 'mimes:png',
            'catalogue_title' => 'required|unique:catalogues', 
        ]);  
        if ($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            //main Image handle separately
            $name               =  '1.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/catalogue/' . $Catalogue->catalogue_title . '/';
            if (!File::exists($destinationPath)) File::makeDirectory($destinationPath, 0777);
            $ImageUpload->save($destinationPath . $name);
        } else {
            $name = '';
        }
        $Catalogue->page        =   $name;
         $Catalogue->page        =   $name;
            /* PDF upload */
            if ($request->hasFile('cataloguepdf')) {
            $file = $request->file('cataloguepdf');
            $destinationPath = 'uploads/catalogue/cataloguepdf/';
            $extension = $file->getClientOriginalExtension();
            $files = $file->getClientOriginalName();
            $fileName = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6)   .  '_' . time() . '.' . $extension;
            $file->move($destinationPath, $fileName);
        } else {
            $fileName = '';
        }
        $Catalogue->catalogue_pdf = $fileName;
        $result = $Catalogue->save();

        //Extra Image handle separately
        if ($request->hasFile('insidepages')) {
            $allowedfileExtension = ['png'];
            $files = $request->file('insidepages');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
            }
            //dd($check);
            if ($check) {
                $Catalogue_id = $Catalogue->id;

                $destinationPath    = 'uploads/catalogue/' . $Catalogue->catalogue_title . '/';
                if (!File::exists($destinationPath)) File::makeDirectory($destinationPath, 0777);
                $i = 2; // remove main page
                foreach ($request->insidepages as $photo) {
                    $insideFilename  =  $i . '.' . $extension;
                    $i++;
                    $ImageUploadPhoto = Image::make($photo)->resize(1000, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $ImageUploadPhoto->save($destinationPath . $insideFilename);
                    CataloguePages::create([
                        'catalogue_id' => $Catalogue_id,
                        'filename' => $insideFilename
                    ]);
                }
            }else {
                return redirect()->back()->with('error', 'Images must be of type png only !');
            }
        }

        if ($result) {
            return redirect('catalogue/view')->with('success', 'Catalogue Added Successfully.');
        } else {
            return redirect()->back()->with('error', 'Something is missing while adding Catalogue.');
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
        $catalogue = Catalogue::find($id);
        return view('admin.catalogue.show', compact('catalogue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalogue = Catalogue::find($id); 
        $cataloguePages = CataloguePages::where('catalogue_id',$catalogue->id)->get();  
         return view('admin.catalogue.edit', compact('catalogue','cataloguePages'));
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

        $Catalogue = Catalogue::find($id); 
        $maxCataloguePagesID = CataloguePages::where('catalogue_id',$Catalogue->id)->max('filename');
         $maxCataloguePagesID =(int)str_replace('.png', '', $maxCataloguePagesID);
        $this->validate($request, [
            'image' => 'mimes:png',  
        ]);    
        if ($request->hasFile('image')) {
            // File::delete('uploads/catalogue' . '/' . $Catalogue->image);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               =  '1.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/catalogue/' . $Catalogue->catalogue_title . '/'; 
            $ImageUpload->save($destinationPath . $name);
        } else {
            $name = $Catalogue->page;
        } 
        $Catalogue->page        =   $name;
        /* PDF upload */
        if ($request->hasFile('cataloguepdf')) {
            $file = $request->file('cataloguepdf');
            $destinationPath = 'uploads/catalogue/cataloguepdf/';
            $extension = $file->getClientOriginalExtension();
            $files = $file->getClientOriginalName();
            if($Catalogue->catalogue_pdf!=""){ $fileName =$Catalogue->catalogue_pdf; }else { $fileName = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6)   .  '_' . time() . '.' . $extension; }
           
            $file->move($destinationPath, $fileName);
        } else {
            $fileName = '';
        }
        $Catalogue->catalogue_pdf = $fileName;

         //Extra Image handle separately
         if ($request->hasFile('insidepages')) {
            $allowedfileExtension = ['png'];
            $files = $request->file('insidepages');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
            }
            //dd($check);
            if ($check) {
                $Catalogue_id = $Catalogue->id;

                $destinationPath    = 'uploads/catalogue/' . $Catalogue->catalogue_title . '/';
                if (!File::exists($destinationPath)) File::makeDirectory($destinationPath, 0777);
                $i =  $maxCataloguePagesID; // remove main page
                foreach ($request->insidepages as $photo) {
                    $i++;
                    $insideFilename  =  $i . '.' . $extension; 
                    $ImageUploadPhoto = Image::make($photo)->resize(1000, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $ImageUploadPhoto->save($destinationPath . $insideFilename);
                    CataloguePages::create([
                        'catalogue_id' => $Catalogue_id,
                        'filename' => $insideFilename
                    ]);
                }
            }else {
                return redirect()->back()->with('error', 'Images must be of type png only !');
            }
        }
        if ($Catalogue->save()) {
            return redirect('catalogue/view')->with('success', 'Catalogue Updated Successfully.');
        } else {
            return redirect()->back()->with('error', 'Something is missing while updating Catalogue.');
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
        $Catalogue = Catalogue::find($id);
        $image = $Catalogue->image;
        $CataloguePages = CataloguePages::where('catalogue_id',$Catalogue->id);
        $destinationPath    = 'uploads/catalogue/' . $Catalogue->catalogue_title . '/'; 
        $CataloguePages ->delete();
        $result = $Catalogue->delete(); 

        if ($result) { 
            if (\File::exists($destinationPath)) \File::deleteDirectory($destinationPath);
            return redirect()->back()->with('error', 'Catalogue Image Deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Catalogue Image Could not be Deleted at this moment.');
        }
    }
     //download pdf
         public function pdfdownload($id)
         {
             $advert = Catalogue::find($id);
             //dd($advert);
             $full_image_path = public_path(). '/uploads/catalogue/cataloguepdf/'. $advert->catalogue_pdf;
             //dd($full_image_path); 
             // filename and look at the extension of the file being requested
             $extension = pathinfo($full_image_path, PATHINFO_EXTENSION);
            
             //create an array of items to reject being downloaded
             $blocked = ['php', 'htaccess'];
             //if the requested file is not in the blocked array
             if (! in_array($extension, $blocked)) {
                 //download the file
                 return response()->download($full_image_path,$advert->catalogue_title.'.'.$extension); // full url of file
             }
         }
}
