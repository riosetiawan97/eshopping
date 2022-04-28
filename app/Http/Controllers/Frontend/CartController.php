<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addproduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        if(Auth::check())
        {
            $prod_check = Product::where('id',$product_id)->first();

            if($prod_check)
            {
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => $prod_check->name." Already Added to Cart"]);
                }
                else
                {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name." Added to Cart"]);
                }    
            }
        }
        else
        {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    public function viewcart()
    { 
        $cartitem = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cartitem'));
    }

    public function deleteproduct(Request $request)
    {        
        if(Auth::check())
        {
            $product_id = $request->input('product_id');
            $product = Product::where('id',$product_id)->first();
            if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
            {
                $cartItem = Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => $product->name." Product Deleted Successfully"]);
            }
        }
        else
        {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

}
