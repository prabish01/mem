<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Complain;
use App\Providers\Utils;
use Illuminate\Http\Request;
use Image;

class ComplainAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return Complain::where('user_id',$id)->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
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
            'remark'=>'nullable|string',
        ]);
        if($request['warrenty']){
        $image1 = Utils::getImagefromRequest($request['warrenty']);
        $ImageUpload        = Image::make($image1)->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $name1               = time().'.png';
        $destinationPath    = 'uploads/complain/';
        $ImageUpload->save($destinationPath.$name1);
        } else{
            $name1 = '';
        }
        if($request['billing']){
            $image2 = Utils::getImagefromRequest($request['billing']);
            $ImageUpload        = Image::make($image2)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name2               = time().'.png';
            $destinationPath    = 'uploads/complain/';
            $ImageUpload->save($destinationPath.$name2);
            } else{
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
            return response(["message"=>"Sucess"],200);
        }else{
            return response(["message"=>"Message Failed"],400);
        } 
    }
 
    public function show($id)
    {
        return Complain::find($id);
    }
   
    public function destroy($id)
    {
        return Complain::destroy($id);
    }

     
}
