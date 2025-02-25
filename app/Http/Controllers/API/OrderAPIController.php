<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\About; 
use App\Model\Info;
use App\Model\Order;
use App\Model\Product;
use App\Model\ShippingDetails;
use Illuminate\Http\Request;
use App\User;

class OrderAPIController extends Controller
{ 
    public function getMyOrders($userid)
    { 
        return Order::where('user_id', $userid)->get(); 
    } 
    public function getOrderDetail($orderid)
    { 
        $order = Order::find($orderid);
        $shippingaddress = ShippingDetails::where('user_id', $order->user_id)->get(); 
        $OrderItems =$order->orderItems;
        return  [ 
            'order'=>$order,
            'shippingaddress'=>$shippingaddress,
            'orderitems'=>$OrderItems 
        ];
    } 
    public function makeOrder(Request $request)
    {   try { 
        $user = User::where('id', $request['user_id'])
            ->where('role_id', '>', '1')
            ->first();

        if (!($user)) {
            $response = [
                'message' => "User Not Found!",
            ];
            return response($response, 440);
        }
        if (!($request->total)|| !($request->products)) {
            $response = [
                'message' => "Input Validation Error!",
            ];
            return response($response, 440);
        } 
    	$order = $user->orders()->create([
    		'total'=>$request->total,
    		'delivered'=>0,
    		'payment_type'=>1,
    	]);
    	$cart_items =   $request->products;   
    	  
    	
    	foreach ($cart_items as $cartitem) {
    		$order->orderItems()->attach( $cartitem['id'],[
    			'qty'=> $cartitem['qty'],
                'color'=>'',
                'size'=>'',
    			'total'=>$cartitem['qty']*$cartitem['price'],
    		]);
            $product_id = $cartitem['id'];
            Product::find($product_id)->decrement('in_stock', $cartitem['qty']);
    	}
 
 
        $response = [
            'message' => "Order Successfully Created!!",
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
