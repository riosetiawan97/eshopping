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
        $order->fname = $request->input('first_name');
        $order->lname = $request->input('last_name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        $order->status = $request->input('status');
        $order->message = $request->input('message');
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
        }

        if(Auth::user()->address1 == NULL)
        {
            $user = User::where('id',Auth::id())->first();
            $user->name = $request->input('first_name');
            $user->lname = $request->input('last_name');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }

    }

}
