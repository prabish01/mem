<?php

namespace App\Http\Controllers\Admin;

use App\Model\Complain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complain::orderBy('id','desc')->get();
        return view('admin.complaint.index', compact('complaints'));
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
        $complaint = Complain::find($id);
        return view('admin.complaint.show', compact('complaint'));
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
        $complaint = Complain::find($id);
        $image1 = $complaint->warrenty;
        $image2 = $complaint->billing;
        if($complaint->delete()){
            File::delete('uploads/complain'.'/'.$image1);
            File::delete('uploads/complain'.'/'.$image2);
            return redirect()->back()->with('error', 'Complaint Deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Complaint Could not be Deleted at this moment.');
        }
    }
}
