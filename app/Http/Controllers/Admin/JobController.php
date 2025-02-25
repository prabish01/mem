<?php

namespace App\Http\Controllers\Admin;

use App\Model\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderBy('id','desc')->get();
        return view('admin.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = new Job();
        $job->title = $request->title;
        if($job->save()){
            return redirect('job/view')->with('success','Job Vacancy Added Successfully.');
        }else{
            return redirect()->back()->with('error','Job Vacancy Could Not Be Added At This Moment.');

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        return view('admin.job.edit',compact('job'));
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
        $job = Job::find($id);
        $job->title = $request->title;
        if($job->save()){
            return redirect('job/view')->with('success','Job Vacancy Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Job Vacancy Could Not Be Updated At This Moment.');

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
        $job = Job::find($id);
        $job->delete();
        return redirect()->back()->with('success','Job Vacancy Deleted Successfully.');
    }

    public function enableJob($id)
    {
        $product = Job::find($id);
        $product->enabled = 1;
        $product->save();
        return redirect()->back()->with('success', 'Job Enabled Successfully');
    }

    public function disableJob($id)
    {
        $product = Job::find($id);
        $product->enabled = 0;
        $product->save();
        return redirect()->back()->with('success', 'Job Disabled Successfully');
    }
}
