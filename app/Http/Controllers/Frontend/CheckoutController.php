<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitem = Cart::where('user_id',Auth::id())->get();
        foreach ($old_cartitem as $item)
        {
            if(!Product::where('id', $item->prod_id)->where('qty','>', $item->prod_qty)->exists())
            {
                $removeitem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeitem->delete();
            }
        }
        $cartitem = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',compact('cartitem'));
    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('first_name');
        $order->lname = $request->input('last_name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone_number');
        $order->address1 = $request->input('address_1');
        $order->address2 = $request->input('address_2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pin_code');
        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');

        //Count Total Price
        $total = 0;
        $cartitem = Cart::where('user_id',Auth::id())->get();
        foreach ($cartitem as $item)
        {
            $total = $total + ($item->prod_qty * $item->product->selling_price);
        }

        $order->total_price = $total;

        $order->tracking_no = 'track'.rand(1111,9999);
        $order->save();
        
        $order->id;
        $cartitem = Cart::where('user_id',Auth::id())->get();
        foreach ($cartitem as $item)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'prod_qty' => $item->prod_qty,
                'prod_price' => $item->product->selling_price,
            ]);
            
            $product = Product::where('id',$item->prod_id)->first();
            $product->qty = $product->qty - $item->prod_qty;
            $product->update();


        }

        if(Auth::user()->address1 == NULL)
        {
            $user = User::where('id',Auth::id())->first();
            $user->name = $request->input('first_name');
            $user->lname = $request->input('last_name');
            $user->phone = $request->input('phone_number');
            $user->address1 = $request->input('address_1');
            $user->address2 = $request->input('address_2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pin_code');
            $user->update();
        }
        
        $cartitem = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitem);

if($request->input('payment_mode') == 'Paid by Razorpay' || $request->input('payment_mode') == 'Paid by Paypal')
        {
	return response()->json(['status'=>"Order Placed Successfully"]);
        }
        return redirect('/')->with('status',"Order Placed Successfully");

    }

    public function razorpaycheck(Request $request)
    {
        $cartitem = Cart::where('user_id',Auth::id())->get();
        $total_price = 0;
        foreach ($cartitem as $item)
        {
            $total_price += $item->product->selling_price * $item->prod_qty;
        }
	$first_name = $request->input('first_name');
        	$last_name = $request->input('last_name');
	$email = $request->input('email');
	$phone_number = $request->input('phone_number');
        	$address_1 = $request->input('address_1');
        	$address_2 = $request->input('address_2');
        	$city = $request->input('city');
        	$state = $request->input('state');
        	$country = $request->input('country');
	$pin_code = $request->input('pin_code');

	return response()->json([
		'first_name' => $first_name,
        		'last_name' => $last_name,
	        	'email' => $email,
		'phone_number' => $phone_number,
        		'address_1' => $address_1,
        		'address_2' => $address_2,
        		'city' => $city,
        		'state' => $state,
        		'country' => $country,
	        	'pin_code' => $pin_code,
	        	'total_price' => $total_price
	]);

    }

}
