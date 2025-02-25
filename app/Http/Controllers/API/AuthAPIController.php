<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Mail\VerifyMail;
use App\Model\DealerProfile;
use App\Model\VerifyUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Image;
use Throwable;
use App\Providers\Utils;
use App\Model\UserImages; 
use App\Model\ShippingDetails;
use File;

class AuthAPIController extends Controller
{
    public function register(Request $data) {
          // Check email
        $user = User::where('email', $data['email']) 
        ->first();
        
        if (!($data['name']) || !($data['pan_number'])|| !($data['password'])
        || !($data['role_id'])|| !($data['email'])) {
            $response = [
                'message' => "Input Validation Error!",
            ];
            return response($response, 440);
        }  
        if (($user)) {
            $response = [
                'message' => "User Already Exists!",
            ];
            return response($response, 440);
        }
        $data->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|min:6|confirmed',
            // 'company_name'=> 'required|string|max:255',
            // 'company_address'=> 'required|string|max:255',
            // 'phone_number'=> 'required|digits:10',
            // 'landline_number'=> 'required|digits:9',
            'pan_number'=> 'required',
            'role_id'=> 'required',
            'is_approved' => 'required',
            // 'pan_image'=> 'required|mimes:jpg,jpeg,png',
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'pan_number' => $data['pan_number'],
            'password' => Hash::make($data['password']),
            'role_id'=> $data['role_id'],
            'is_approved' => 0,//$data['is_approved'],
        ]);

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40),
        ]);

        Mail::to($user->email)->send(new VerifyMail($user)); 

        // $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            // 'token' => $token
        ];

        return response($response, 201);
    }
    public function registerDealer(Request $data) {
        // Check email
        $user = User::where('email', $data['email']) 
        ->first();
        
        if (!($data['name']) || !($data['pan_number'])|| !($data['password'])
        || !($data['role_id'])|| !($data['email'])) {
            $response = [
                'message' => "Input Validation Error!",
            ];
            return response($response, 440);
        }  
        if (($user)) {
            $response = [
                'message' => "User Already Exists!",
            ];
            return response($response, 440);
        }
        $data->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|min:6|confirmed',
            'company_name'=> 'required|string|max:255',
            'company_address'=> 'required|string|max:255',
            'phone_number'=> 'required|digits:10',
            'landline_number'=> 'required|digits:9',
            'pan_number'=> 'required',
            'role_id'=> 'required',
            'is_approved' => 'required',
            'pan_image'=> 'required',
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'pan_number' => $data['pan_number'],
            'password' => Hash::make($data['password']),
            'role_id'=> $data['role_id'],
            'is_approved' => $data['is_approved'],
        ]);
        $user_id = $user->id;
        DealerProfile::create([
            'user_id'=> $user_id,
            'company_name'=> $data->company_name,
            'company_address'=> $data->company_address,
            'phone_number'=> $data->phone_number,
            'landline_number'=>$data->landline_number,
            'pan_number'=>$data->pan_number,
        ]);
       $panImage = Utils::getImagefromRequest($data['pan_image']);
        $destinationPath    = 'uploads/userimages/' ;
        if ($panImage) {
            $insideFilename  =   substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6)   .time() . '.png'; 
            $ImageUploadPhoto = Image::make($panImage)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $ImageUploadPhoto->save($destinationPath . $insideFilename);
            UserImages::create([
                'user_id' =>  $user_id,
                'image_name' => $insideFilename
            ]);
        }

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40),
        ]);

        Mail::to($user->email)->send(new VerifyMail($user)); 

        // $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            // 'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        
         if ( ! $request['email'] || ! $request['password']) {
            return response([
                'message' => 'UserName or password is empty!!'
            ], 401);
        }
        $user = User::where('email', $request['email'])
        ->where('role_id', '>', '1')
        ->first();
       
        if (!($user)) {
                $response = [
                    'message' => "User Not Found!",
                ];
                return response($response, 440);
            }
        // Check password
        if ( !Hash::check($request['password'], $user->password)) {
            return response([
                'message' => 'Your Password is Incorrect!!'
            ], 401);
        }
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]); 
        // $token = $user->createToken('myapptoken')->plainTextToken;

         
           $userShippingDetails =   ShippingDetails::where('user_id', '=', $user->id)->first();
           if ($userShippingDetails == null) {
            $userShippingDetails = new ShippingDetails();
            $userShippingDetails->id = 0;
            $userShippingDetails->user_id = '';
            $userShippingDetails->province = '';
            $userShippingDetails->zone ='';
            $userShippingDetails->district ='';
            $userShippingDetails->city = '';
            $userShippingDetails->street ='';
            $userShippingDetails->phone_number ='';
            $userShippingDetails->created_at = $user->updated_at;
            $userShippingDetails->updated_at = $user->updated_at;
        }
            $response = [
                'user'=>$user, 
                'ShippingDetails'=>  $userShippingDetails,  
            ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        // auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

    
     public function changePassword(Request $request)
    {
        try {
            $user = User::where('id', $request['id'])
                ->where('role_id', '>', '1')
                ->first();
            if (!($user)) {
                $response = [
                    'message' => "User Not Found!",
                ];
                return response($response, 440);
            }
            if (!(Hash::check($request->get('current-password'), $user->password))) {
                $response = [
                    'message' => "Your current password does not matches with the password you provided. Please try again.",
                ];
                return response($response, 440);
            }

            if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
                $response = [
                    'message' => "New Password cannot be same as your current password. Please choose a different password.",
                ];
                return response($response, 440);
            }

            $validatedData = $request->validate([
                'current-password' => 'required',
                'new-password' => 'required|string|min:6',
            ]);

            //Change Password 
            $user->password = bcrypt($request->get('new-password'));
            $user->save();


            $response = [
                'message' => "Password Successfully Changed!!",
            ];
            return response($response, 201);
        } catch (Throwable $e) {
            $response = [
                'message' => "Something went Wrong" . $e,
            ];
            return response($response, 440);
        }
    }

    public function updateuserinfo(Request $request)
    {
        try {
            $user = User::where('id', $request['id'])
                ->where('role_id','3')
                ->first();

            if (!($user)) {
                $response = [
                    'message' => "User Not Found!",
                ];
                return response($response, 440);
            }
            if (!($request->name) || !($request->pan_number)) {
                $response = [
                    'message' => "Input Validation!",
                ];
                return response($response, 440);
            }
            $user->name = $request->name;
            $user->pan_number = $request->pan_number;
            $user->save();

            $user_address_count =ShippingDetails::where('user_id', '=', $user->id)->count();
    	if ($user_address_count == 0) {
    		ShippingDetails::create([
    			'user_id'=>$user->id,
    			'province'=>$request->province,
    			'zone'=>$request->shipping_zone,
    			'district'=>$request->shipping_district,
    			'city'=>$request->shipping_city,
    			'street'=>$request->shipping_street,
    			'phone_number'=>$request->phone_number,
    		]);
    	} else {
    		ShippingDetails::where('user_id', '=',$user->id)->update([
    			'user_id'=> $user->id,
                'province'=>$request->province,
    			'zone'=>$request->shipping_zone,
    			'district'=>$request->shipping_district,
    			'city'=>$request->shipping_city,
    			'street'=>$request->shipping_street,
    			'phone_number'=>$request->phone_number,
    		]);
    	} 
            $response = [
                'message' => "User Successfully Changed!!",
            ]; 

            return response($response, 201);
        } catch (Throwable $e) {
            $response = [
                'message' => "Something went Wrong" . $e,
            ];
            return response($response, 440);
        }
    } 
    
    public function updateDealerInfo(Request $request)
    {
        try {
            $user = User::where('id', $request['id'])
                ->where('role_id',  '2')
                ->first();

            if (!($user)) {
                $response = [
                    'message' => "Dealer Not Found!",
                ];
                return response($response, 440);
            }
            if (!($request->name) || !($request->pan_number)) {
                $response = [
                    'message' => "Input Validation!",
                ];
                return response($response, 440);
            }
            $user->name = $request->name;
            $user->pan_number = $request->pan_number;
    
            $dealer_profile = DealerProfile::where('user_id', $user->id)->first();
            $dealer_profile->company_name = $request->company_name;
            $dealer_profile->company_address = $request->company_address;
            $dealer_profile->phone_number = $request->phone_number;
            $dealer_profile->landline_number = $request->landline_number;
            $dealer_profile->pan_number = $request->pan_number;
            $user->save();
            $dealer_profile->save();

            $user_address_count =ShippingDetails::where('user_id', '=', $user->id)->count();
    	if ($user_address_count == 0) {
    		ShippingDetails::create([
    			'user_id'=>$user->id,
    			'province'=>$request->province,
    			'zone'=>$request->shipping_zone,
    			'district'=>$request->shipping_district,
    			'city'=>$request->shipping_city,
    			'street'=>$request->shipping_street,
    			'phone_number'=>$request->phone_number,
    		]);
    	} else {
    		ShippingDetails::where('user_id', '=',$user->id)->update([
    			'user_id'=> $user->id,
                'province'=>$request->province,
    			'zone'=>$request->shipping_zone,
    			'district'=>$request->shipping_district,
    			'city'=>$request->shipping_city,
    			'street'=>$request->shipping_street,
    			'phone_number'=>$request->phone_number,
    		]);
    	} 
            $response = [
                'message' => "User Successfully Changed!!",
            ]; 

            return response($response, 201);
        } catch (Throwable $e) {
            $response = [
                'message' => "Something went Wrong" . $e,
            ];
            return response($response, 440);
        }
    }

    public function updateimage(Request $request)
    {
        try {
            $user = User::where('id', $request['id'])
                ->where('role_id', '>', '1')
                ->first();

            if (!($user)) {
                $response = [
                    'message' => "User Not Found!",
                ];
                return response($response, 440);
            }
            $profileImage = Utils::getImagefromRequest( $request['profile_image']);
            $destinationPath    = 'uploads/userimages/';
            
             if($user->profile_image){ File::delete($destinationPath.'/'.$user->profile_image);}
             
            if ($profileImage) {
                $insideFilename  =   substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6)   . time() . '.png';
                $ImageUploadPhoto = Image::make($profileImage)->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $ImageUploadPhoto->save($destinationPath . $insideFilename); 
                $user->profile_image = $insideFilename; 
                $user->save();
                $response = [
                    'message' => $user->profile_image,
                ];
                return response($response, 201);
            } 
        } catch (Throwable $e) {
            $response = [
                'message' => "Something went Wrong" . $e,
            ];
            return response($response, 440);
        }
    }

    public function getUserInfo($id)
    {
        try {
            $user = User::where('id', $id)
                ->where('role_id', '3')
                ->first();
            if (!($user)) {
                $response = [
                    'message' => "User Not Found!",
                ];
                return response($response, 440);
            }
           
            $userShippingDetails =   ShippingDetails::where('user_id', '=', $user->id)->first();
            $response = [
                'user'=>$user, 
                'ShippingDetails'=>  $userShippingDetails,  
            ];
            return response($response, 201);
        } catch (Throwable $e) {
            $response = [
                'message' => "Something went Wrong" . $e,
            ];
            return response($response, 440);
        }
    }
  
    public function getDealerInfo($id)
    {
        try {
            $user = User::where('id', $id)
                ->where('role_id', '2')
                ->first();

            if (!($user)) {
                $response = [
                    'message' => "User Not Found!",
                ];
                return response($response, 440);
            }
            
            $dealerProfile =   DealerProfile::where('user_id', '=', $user->id)->first();
            $response = [ 
                'DealerProfile' =>  $dealerProfile,
            ];
            return response($response, 201);
        } catch (Throwable $e) {
            $response = [
                'message' => "Something went Wrong" . $e,
            ];
            return response($response, 440);
        }
    }
}
