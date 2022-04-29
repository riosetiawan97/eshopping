<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
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
    
    }

}
