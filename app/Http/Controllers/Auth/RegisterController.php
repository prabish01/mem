<?php

namespace App\Http\Controllers\Auth;

use File;
use Image;
use Mail;
use Auth;
use App\User;
use App\Mail\VerifyMail;
use App\Model\VerifyUser;
use App\Model\DealerProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'pan_number' => 'required',
            'role_id'=> 'required', 
            'is_approved'=>'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'pan_number' => $data['pan_number'],
            'password' => Hash::make($data['password']),
            'role_id'=> $data['role_id'],
            'is_approved' => $data['is_approved'],
        ]);

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40)
        ]);

        Mail::to($user->email)->send(new VerifyMail($user));

        return $user;
    }

    protected function dealersingnupform()
    {
        return view('auth.dealersignup');
    }

    protected function registerdealer(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|min:6|confirmed',
            'company_name'=> 'required|string|max:255',
            'company_address'=> 'required|string|max:255',
            'phone_number'=> 'required|digits:10',
            'landline_number'=> 'required|digits:9',
            'pan_number'=> 'required', 
            'userimages'=> 'required',
        ]);
            //Extra Image handle separately
            if ($request->hasFile('userimages')) {
                $allowedfileExtension = ['jpg','jpeg','png'];
                $files = $request->file('userimages');
                foreach ($files as $file) {
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $check = in_array(strtolower($extension), $allowedfileExtension);
                }   
            //   dd($request);
                if ($check) { }else{
                    return redirect()->back()->with('error', 'Image Format not valid!');
                }
                $user = User::create([
                    'name'=>$request->name,
                    'email'=> $request->email,
                    'password'=>bcrypt($request->password),
                    'role_id'=>$request->role_id,
                ]);
                $user_id = $user->id;
                if ($check) { 
                    $destinationPath    = 'uploads/userimages/' ;
                    if (!File::exists($destinationPath)) File::makeDirectory($destinationPath, 775); 
                    foreach ($request->userimages as $photo) {
                        $insideFilename  =   substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6)   .time() . '.' . $extension; 
                        $ImageUploadPhoto = Image::make($photo)->resize(1000, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        $ImageUploadPhoto->save($destinationPath . $insideFilename);
                        UserImages::create([
                            'user_id' =>  $user_id,
                            'image_name' => $insideFilename
                        ]);
                    }
                }else {
                    return redirect()->back()->with('error', 'Images must be of type png only !');
                }
            }

       

        DealerProfile::create([
            'user_id'=> $user_id,
            'company_name'=> $request->company_name,
            'company_address'=> $request->company_address,
            'phone_number'=> $request->phone_number,
            'landline_number'=>$request->landline_number,
            'pan_number'=>$request->pan_number,
        ]);
        // if ($request->file('pan_image')) {
        //     $user->addMediaFromRequest('pan_image')->toMediaCollection('pan_image', 'media');
        // }

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40)
        ]);

        Mail::to($user->email)->send(new VerifyMail($user));

        // Auth::login($user);
        return redirect('/login')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');

    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect('/login')->with('status', $status);
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');
    }
}
