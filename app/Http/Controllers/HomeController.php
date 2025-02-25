<?php

namespace App\Http\Controllers;

use App\Model\About;
use App\Model\Category;
use App\Model\Partner;
use App\Model\Rated;
use App\Model\Slider;
use App\Model\Testimonal;
use Illuminate\Http\Request;
use App\Model\Job;
use App\Model\Vacancy;

use App\Model\Product;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::select('*')->where('show','=','1')->get();
        $about = About::select('*')->first();
        $categories = Category::select('*')->latest()->paginate(6);
        $rates = Rated::select('*')->get();
        $testimonals = Testimonal::select('*')->get();
        $partners = Partner::select('*')->get();
          $partners = Partner::select('*')->get();
        $featured = Product::select('*')->where('enabled','=','1')->where('featured','=','1')->inRandomOrder()->paginate(10);
        $specials = Product::select('*')->where('enabled','=','1')->where('special','=','1')->inRandomOrder()->paginate(10);
        $products = Product::select('*')->where('enabled','=','1')->inRandomOrder()->paginate(10);
        return view('welcome', compact('sliders', 'about', 'categories', 'rates', 'testimonals', 'partners','featured','specials','products'));
    
    }

    public function approval()
    {
        return view('frontend.pages.approval');
    }
       //career page
    public function career()
    {
        $jobs = Job::select('*')->where('enabled', '=', '1')->get();
        return view('frontend.pages.career', compact('jobs'));
    }
    //career post vacancy
    public function vacancy(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'vacancy' => 'required|string',
            'cv' => 'required|mimes:pdf'
        ]);
        /* PDF upload */
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $destinationPath = 'uploads/cv/';
            $extension = $file->getClientOriginalExtension();
            $files = $file->getClientOriginalName(); 
            $fileName = pathinfo($files, PATHINFO_FILENAME) . '_' . time() . '.' . $extension;
            $file->move($destinationPath, $fileName);
        } else {
            $files = '';
        }

        $vacancy = new Vacancy();
        $vacancy->name = $request->name;
        $vacancy->email = $request->email;
        $vacancy->phone = $request->phone;
        $vacancy->vacancy = $request->vacancy;
        $vacancy->cv = $fileName;
        if ($vacancy->save()) {
            return redirect()->back()->with('success', 'Your Form Is Submitted Successfully.');
        } else {
            return redirect()->back()->with('error', 'Something Is missing while submitting FOrm.');
        }
    }
    //all featured products
    public function featured()
    {
        $allfeatured = Product::select('*')->where('enabled', '=', '1')->where('featured', '=', '1')->latest()->paginate(15);
        return view('frontend.featured.allproduct', compact('allfeatured'));
    }
    //all offer products
    public function offer()
    {
        $alloffer = Product::select('*')->where('enabled', '=', '1')->where('discount_price', '>', 0)->latest()->paginate(15);
        return view('frontend.pages.offer', compact('alloffer'));
    }
   //all offer products
    public function allProducts()
    {
        $products = Product::select('*')->where('enabled', '=', '1')->latest()->paginate(15);
        return view('frontend.products.categorydata', compact('products'));
    }

}

