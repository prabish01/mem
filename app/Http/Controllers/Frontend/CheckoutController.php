<?php

namespace App\Http\Controllers\Frontend;
use Auth;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Model\ShippingDetails;
use App\Http\Controllers\Controller;
Use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;  
        $address = ShippingDetails::where('user_id', '=', $id)->first();
        if ($address == null) {
            $address = new   ShippingDetails;
            $address->id = 0;
        }
        $cartitems = Cart::content();
    	return view('frontend.checkout.shippinginfo', compact('cartitems','address'));
    }

    public function PaymentOption(Request $request)
    {
    	//insert shipping info to the database
        if(Cart::subtotal()==0){ 
            return redirect("/") ->with('error', 'No Items in Cart!!');
        }
         $this->validate($request, [
            'province'=> 'required',
            'shipping_zone'=> 'required',
            'shipping_district'=> 'required',
            'shipping_city'=> 'required',
            'shipping_street'=> 'required',
            'phone_number'=> 'required',
        ]);
    	$id = Auth::user()->id;
    	$user_address_count =ShippingDetails::where('user_id', '=',$id)->count();
    	if ($user_address_count == 0) {
    		ShippingDetails::create([
    			'user_id'=> Auth::user()->id,
    			'province'=>$request->province,
    			'zone'=>$request->shipping_zone,
    			'district'=>$request->shipping_district,
    			'city'=>$request->shipping_city,
    			'street'=>$request->shipping_street,
    			'phone_number'=>$request->phone_number,
    		]);
    	} else {
    		ShippingDetails::where('user_id', '=',$id)->update([
    			'user_id'=> Auth::user()->id,
                'province'=>$request->province,
    			'zone'=>$request->shipping_zone,
    			'district'=>$request->shipping_district,
    			'city'=>$request->shipping_city,
    			'street'=>$request->shipping_street,
    			'phone_number'=>$request->phone_number,
    		]);
    	}

    	$amount = Cart::subtotal();
    	return view('frontend.checkout.payment',compact('amount'));

    }

    public function CashOnDelivery()
    {
         if(Cart::subtotal()==0){ 
            return redirect("/") ->with('error', 'No Items in Cart!!');
        }
    	$user = Auth::user();
    	$order = $user->orders()->create([
    		'total'=>Cart::subtotal(),
    		'delivered'=>0,
    		'payment_type'=>1,
    	]);
    	$cart_items = Cart::content();
    	foreach ($cart_items as $cartitem) {
    		$order->orderItems()->attach($cartitem->id,[
    			'qty'=>$cartitem->qty,
                'color'=>$cartitem->options['color'],
                'size'=>$cartitem->options['size'],
    			'total'=>$cartitem->qty*$cartitem->price,
    		]);
            $product_id = $cartitem->id;
            Product::find($product_id)->decrement('in_stock', $cartitem->qty);
    	}

    	Cart::destroy();
    	return redirect('thanku');
    }
    // khalti payment  gateway
    public function khaltipayment()
    {
        $user = Auth::user();
        $order = $user->orders()->create([
            'total'=>Cart::subtotal(),
            'delivered'=>0,
            'payment_type'=>2,
        ]);

        $cart_items = Cart::content();
        foreach ($cart_items as $cartitem) {
            $order->orderItems()->attach($cartitem->id,[
                'qty'=>$cartitem->qty,
                'color'=>$cartitem->options['color'],
                'size'=>$cartitem->options['size'],
                'total'=>$cartitem->qty*$cartitem->price
            ]);

            $product_id = $cartitem->id;
            Product::find($product_id)->decrement('in_stock', $cartitem->qty);
        }

        Cart::destroy();
        return redirect('thanku');
    }
}
