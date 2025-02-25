<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Model\Order;
use App\Model\Product;
use App\Model\ContactUs;
use App\Model\JobApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Complain;
use App\Model\DealerProfile;
use App\Model\ShippingDetails;
use Auth;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;
use PDF;
use File;
use Image; 
use App\Model\UserImages;

class UsersDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    { 
		$id = Auth::user()->id;
		$currentuser = User::find($id);
		$userImages = UserImages::where('user_id', '=', $id)->get();
        $address = ShippingDetails::where('user_id', '=', $currentuser->id)->first();
        if ($address == null) {
            $address = new   ShippingDetails;
            $address->id = 0;
        }
    	
        return view('user.index', compact('currentuser', 'userImages', 'address'));
    }

	public function changePasswordForm()
    { 
		$id = Auth::user()->id;
		$currentuser = User::find($id);
    	return view('user.changepassword',compact('currentuser'));
    }

	public function myOrdersList()
    { 
		$id = Auth::user()->id;  
		$orders = Order::where('user_id',$id)->get();
        return view('user.order', compact('orders'));
    }
    Public function showOrderDetails($id)
    {
        $order = Order::find($id);
        $user = $order->user_id;
        $address = ShippingDetails::where('user_id','=', $user)->first();
        return view('user.showorderdetail', compact('order', 'address'));
    }

	Public function generateorderPDF($id)
    {
        $order = Order::find($id);
        $user = $order->user_id;
        $address = ShippingDetails::where('user_id','=', $user)->first();
        $pdf = PDF::loadview('user.pdf', compact('order', 'address'));
        return $pdf->stream('invoice.pdf');

    }
    // public function myComplainsList()
    // {
    //     $id = Auth::user()->id;   
    //     $complaints = Complain::where('user_id',$id)->orderBy('id','desc')->get();
    //     return view('user.mycomplains', compact('complaints'));
    // }

    public function updateuserinfo(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|max:255', 
            'pan_number'=> 'required', 
        ]);

         $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->pan_number = $request->pan_number;
        if ($request->hasFile('userimages')) {
            $allowedfileExtension = ['jpg', 'jpeg', 'png'];
            $files = $request->file('userimages');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array(strtolower($extension), $allowedfileExtension);
            }
            if ($check) {
            } else {
                return redirect()->back()->with('error', 'Image Format not valid!');
            }
            if ($check) {
                $destinationPath    = 'uploads/userimages/';
                if (!File::exists($destinationPath)) File::makeDirectory($destinationPath, 775);
                foreach ($request->userimages as $photo) {
                    $insideFilename  =   substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6)   . time() . '.' . $extension;
                    $ImageUploadPhoto = Image::make($photo)->resize(1000, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $ImageUploadPhoto->save($destinationPath . $insideFilename);
                    UserImages::create([
                        'user_id' => $id,
                        'image_name' => $insideFilename
                    ]);
                }
            } else {
                return redirect()->back()->with('error', 'Images must be of type png only !');
            }
        }
        $user_address_count = ShippingDetails::where('user_id', '=', $id)->count();

        if ($request->province == null) {
            $request->province = "";
        }
        if ($request->zone == null) {
            $request->zone = "";
        }
        if ($request->district == null) {
            $request->district = "";
        }
        if ($request->city == null) {
            $request->city = "";
        }
        if ($request->street == null) {
            $request->street = "";
        }
        if ($request->phone_number == null) {
            $request->phone_number = "";
        } 
        if ($user_address_count == 0) {
            ShippingDetails::create([
                'user_id' => Auth::user()->id,
                'province' => $request->province,
                'zone' => $request->zone,
                'district' => $request->district,
                'city' => $request->city,
                'street' => $request->street,
                'phone_number' => $request->phone_number,
            ]);
        } else {
            ShippingDetails::where('user_id', '=', $id)->update([
                'user_id' => Auth::user()->id,
                'province' => $request->province,
                'zone' => $request->zone,
                'district' => $request->district,
                'city' => $request->city,
                'street' => $request->street,
                'phone_number' => $request->phone_number,
            ]);
        }
  
        $user->save();
        return redirect()->back()->with('success', 'User successfully updated');
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }

    public function dealerDashboard()
    {
        $id = Auth::user()->id; 
        $currentuser = User::find($id);
        if($currentuser->role_id !=2)
             return redirect('/')->withErrors("Something Went Wrong!!"); 

        $dealer_profile = DealerProfile::where('user_id', $id)->first();
        
        $userImages = UserImages::where('user_id', '=', $id)->get();
        $address = ShippingDetails::where('user_id', '=', $currentuser->id)->first();
        if ($address == null) {
            $address = new   ShippingDetails;
            $address->id = 0;
        }
        return view('user.dealerdashboard', compact('currentuser', 'dealer_profile', 'userImages','address'));

    }
    public function updateDealerInfo(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            // 'email'=> 'required|string|email|max:255|unique:users',
            // 'password'=> 'required|string|min:6|confirmed',
            'company_name'=> 'required|string|max:255',
            'company_address'=> 'required|string|max:255',
            'phone_number'=> 'required|digits:10',
            'landline_number'=> 'required|digits:9',
            'pan_number'=> 'required',
            // 'pan_image'=> 'required|mimes:jpg,jpeg,png',
        ]);
       
        $id = Auth::user()->id; 
        $currentuser = User::find($id);
        if($currentuser->role_id !=2)
             return redirect('/')->withErrors("User Not Found!!"); 
       //Extra Image handle separately
        if ($request->hasFile('userimages')) {
            $allowedfileExtension = ['jpg', 'jpeg', 'png'];
            $files = $request->file('userimages');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array(strtolower($extension), $allowedfileExtension);
            } 
            if ($check) {
            } else {
                return redirect()->back()->with('error', 'Image Format not valid!');
            }
            if ($check) {
                $destinationPath    = 'uploads/userimages/';
                if (!File::exists($destinationPath)) File::makeDirectory($destinationPath, 775);
                foreach ($request->userimages as $photo) {
                    $insideFilename  =   substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6)   . time() . '.' . $extension;
                    $ImageUploadPhoto = Image::make($photo)->resize(1000, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $ImageUploadPhoto->save($destinationPath . $insideFilename);
                    UserImages::create([
                        'user_id' => $id,
                        'image_name' => $insideFilename
                    ]);
                }
            } else {
                return redirect()->back()->with('error', 'Images must be of type png only !');
            }
        }
        $currentuser->name = $request->name;
        $currentuser->pan_number = $request->pan_number;  
         
        $dealer_profile = DealerProfile::where('user_id', $id)->first(); 
        $dealer_profile->company_name = $request->company_name;
        $dealer_profile->company_address = $request->company_address;
        $dealer_profile->phone_number = $request->phone_number;
        $dealer_profile->landline_number = $request->landline_number;
        $dealer_profile->pan_number = $request->pan_number; 
        $currentuser->save();
        $dealer_profile->save();
          $user_address_count = ShippingDetails::where('user_id', '=', $id)->count();
        
        if ($request->province == null) {
            $request->province = "";
        }
        if ($request->zone == null) {
            $request->zone = "";
        }
        if ($request->district == null) {
            $request->district = "";
        }
        if ($request->city == null) {
            $request->city = "";
        }
        if ($request->street == null) {
            $request->street = "";
        }
        if ($request->phone_number == null) {
            $request->phone_number = "";
        } 
        if ($user_address_count == 0) {
            ShippingDetails::create([
                'user_id' => Auth::user()->id,
                'province' => $request->province,
                'zone' => $request->zone,
                'district' => $request->district,
                'city' => $request->city,
                'street' => $request->street,
                'phone_number' => $request->phone_number,
            ]);
        } else {
            ShippingDetails::where('user_id', '=', $id)->update([
                'user_id' => Auth::user()->id,
                'province' => $request->province,
                'zone' => $request->zone,
                'district' => $request->district,
                'city' => $request->city,
                'street' => $request->street,
                'phone_number' => $request->phone_number,
            ]);
        }
        return redirect()->back()->with("success","Dealer Updated Sucessfully !");

    }


    public function profilepicchange(Request $request)
    {
        try {
            $id = Auth::user()->id;
            $user = User::find($id); 
            if ($request->hasFile('profileImage')) { 
               $profileImage= $request->file('profileImage');
                $destinationPath    = 'uploads/userimages/';
                if ($user->profile_image) {
                    File::delete($destinationPath . '/' . $user->profile_image);
                } 
                    $insideFilename  =   substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6)   . time() . '.png';
                    $ImageUploadPhoto = Image::make($profileImage)->resize(400, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $ImageUploadPhoto->save($destinationPath . $insideFilename);
                    $user->profile_image = $insideFilename;
                    $user->save();  
            }  
          
        return redirect()->back()->with('success', 'Profile Pic successfully updated');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Something went wrong');  
        }
    }

}
