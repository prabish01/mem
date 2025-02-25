<?php

namespace App\Http\Controllers\Frontend;

use App\Model\About;
use App\Model\Blog;
use App\Model\Complain;
use App\Model\Faq;
use App\Model\Info;
use App\Model\Page;
use App\Model\Service;
use App\Model\Subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;
 
use App\Mail\NewSubscription;
use Exception;
use App\Mail\NewComplainNotification;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{

    public function subscribe(Request $request)
    {
       $request->validate([
           'email'=>'required|email'
       ]);
       $email = new Subscribe();
       $email->email = $request->email;
       if($email->save()){
            try {
                Mail::to("info@mem.com.np")->send(new NewSubscription($email));
            } catch (Exception $e) {
            }
           return redirect()->back()->with('success','Successfully Subscribe.');
       }else{
           return redirect()->back()->with('error','Something Wrong.');
       }
    }
	
	 public function blog()
    {
        $blogs = Blog::select('*')->latest()->paginate(9);
        return view('frontend.blog.blogs', compact('blogs'));
    }
    public function singleblog($id)
    {
        $blog = Blog::select('*')->where('id',$id)->first();
        return view('frontend.blog.singleblog', compact('blog'));
    }

    public function aboutus()
    {
        $about = About::select('*')->first();
    	return view('frontend.aboutus.index', compact('about'));
    }

    public function career()
    {
    	return view('frontend.career.index');
    }

    public function contact()
    {
        $info = Info::select('*')->first();
    	return view('frontend.contact.index', compact('info'));
    }

    public function faq()
    {
        $faqs = Faq::select('*')->get();
        return view('frontend.pages.faq', compact('faqs'));
    }

    public function privacy()
    {
        $privacy = Page::select('*')->where('id','1')->first();
        return view('frontend.pages.privacy', compact('privacy'));
    }

    public function terms()
    {
        $term = Page::select('*')->where('id','3')->first();
        return view('frontend.pages.terms', compact('term'));
    }

    public function delivery()
    {
        $delivery = Page::select('*')->where('id','6')->first();
        return view('frontend.pages.deliveryinfo', compact('delivery'));
    }

    public function payment()
    {
        $payment = Page::select('*')->where('id','4')->first();
        return view('frontend.pages.payment', compact('payment'));
    }

    public function dealer()
    {
        $dealer = Page::select('*')->where('id','5')->first();
        return view('frontend.pages.dealer', compact('dealer'));
    }

    public function returns()
    {
        $return = Page::select('*')->where('id','2')->first();
        return view('frontend.pages.return', compact('return'));
    }

    public function services()
    {
        $service = Service::select('*')->first();
        return view('frontend.pages.service', compact('service'));
    }
    public function complain(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|string',
            'state'=>'required|string',
            'city'=>'required|string',
            'address'=>'required|string',
            'street'=>'required|string',
            'landmark'=>'nullable|string',
            'category'=>'required|string',
            'product'=>'required|string',
            'productserial'=>'required|string',
            'purchase_date'=>'required|date',
            'complaint'=>'required|string',
            'warrenty'=>'nullable|image',
            'billing'=>'nullable|image',
            'remark'=>'nullable|string',
        ]);
        if($request->hasFile('warrenty')) {
            $image1              = $request->file('warrenty');
            $ImageUpload        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name1               = time().'.' . $image1->getClientOriginalExtension();
            $destinationPath    = 'uploads/complain/';
            $ImageUpload->save($destinationPath.$name1);
        }else{
            $name1 = '';
        }
        if($request->hasFile('billing')) {
            $image2              = $request->file('billing');
            $ImageUpload        = Image::make($image2)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name2               = time().'.' . $image2->getClientOriginalExtension();
            $destinationPath    = 'uploads/complain/';
            $ImageUpload->save($destinationPath.$name2);
        }else{
            $name2 = '';
        }
        $complain = new Complain();
        $complain->name = $request->name;
        $complain->email = $request->email;
        $complain->phone = $request->phone;
        $complain->state = $request->state;
        $complain->city = $request->city;
        $complain->address = $request->address;
        $complain->street = $request->street;
        $complain->landmark = $request->landmark;
        $complain->category = $request->category;
        $complain->product = $request->product;
        $complain->productserial = $request->productserial;
        $complain->purchase_date = $request->purchase_date;
        $complain->complaint = $request->complaint;
        $complain->warrenty = $request->warrenty;
        $complain->billing = $request->billing;
        $complain->remark = $request->remark;
        $complain->warrenty = $name1;
        $complain->billing = $name2;
        if($complain->save()){
            try {
         
            Mail::to("mycare@mem.com.np")->send(new NewComplainNotification($complain));
        } catch (Exception $e) {
        }
            return redirect()->back()->with('success','Your Complaint Is Send Successfully.');
        }else{
            return redirect()->back()->with('error','Your Complaint Cannot Be Send At This Moment.');
        }
    }
}
