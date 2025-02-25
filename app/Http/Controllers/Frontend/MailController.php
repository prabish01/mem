<?php

namespace App\Http\Controllers\Frontend;

use App\Model\JobApplication;
use App\Model\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\NewContactUs;
use App\Mail\NewJobNotification; 
use Exception; 
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request)
    {
    	$this->validate($request, [
    		'sender_name'=> 'required|max:25',
    		'sender_email'=> 'required|email',
    		'subject' => 'required|max:100',
    		'message' => 'required',
    	]);

        $ContactUs =	ContactUs::create($request->all());
    	
    	 try {
            Mail::to("info@mem.com.np")->send(new NewContactUs($ContactUs));
        } catch (Exception $e) {
        }
    	return redirect()->back()->with('success', 'Your message has been sent Successfully');
    }

    public function applyjob(Request $request)
    {
        $this->validate($request, [
           'applicants_name'=> 'required|max:40',
           'applicants_email'=> 'required',
           'applicants_address'=>'required',
           'gender'=> 'required',
           'phone_number'=>'required|max:10',
           'applied_post'=>'required',
           'experience'=> 'required',
        ]);
       
       $jobapplication= JobApplication::create($request->all());
         try {
            Mail::to("info@mem.com.np")->send(new NewJobNotification($jobapplication));
        } catch (Exception $e) {
        }
        return redirect()->back()->with('success', 'Thank you for Applying the Job. We will Contact you as soon as possible');
    }
}
