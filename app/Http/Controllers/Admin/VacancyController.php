<?php

namespace App\Http\Controllers\Admin;

use App\Model\Vacancy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancyy = Vacancy::orderBy('id','desc')->get();
        return view('admin.vacancy.index', compact('vacancyy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacancy = Vacancy::find($id);
        return view('admin.vacancy.show', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $vacancy = Vacancy::find($id);
		$cv = $vacancy->cv;
		if($vacancy->delete()){
			\File::delete('uploads/cv/'.$cv);
		 return redirect()->back()->with('error', 'Vacancy Post Deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Vacancy Post Could not be Deleted at this moment.');
        }
    }
	
	 //download pdf
    public function pdfdownload($id)
    {
        $advert = Vacancy::find($id);
        //dd($advert);
        $full_image_path = public_path(). '/uploads/cv/'. $advert->cv;
        //dd($full_image_path);
        // filename and look at the extension of the file being requested
        $extension = pathinfo($advert->cv, PATHINFO_EXTENSION);
        //dd($extension);
        //create an array of items to reject being downloaded
        $blocked = ['php', 'htaccess'];
        //if the requested file is not in the blocked array
        if (! in_array($extension, $blocked)) {
            //download the file
            return response()->download($full_image_path); // full url of file
        }
    }
}
