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
            if(!Product::where('id', $item->prod_id)->where('qty','>=', $item->prod_qty)->exists())
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

        return redirect('/')->with('status',"Order Placed Successfully");

    }

}
