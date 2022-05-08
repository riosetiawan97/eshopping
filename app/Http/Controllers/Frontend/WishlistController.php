<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    { 
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist',compact('wishlist'));
    }

    public function add(Request $request)
    {
        $product_id = $request->input('product_id');
        if(Auth::check())
        {
            $prod_check = Product::where('id',$product_id)->first();

            if(Product::find($product_id))
            {
                if(Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => $prod_check->name." Already Added to Whishlist"]);
                }
                else
                {
                    $wishlist = new Wishlist();
                    $wishlist->prod_id = $product_id;
                    $wishlist->user_id = Auth::id();
                    $wishlist->save();
                    return response()->json(['status' => $prod_check->name." Added to Whishlist"]);
                }    
            }
        }
        else
        {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    public function deleteitem(Request $request)
    {        
        if(Auth::check())
        {
            $product_id = $request->input('product_id');
            $product = Product::where('id',$product_id)->first();
            if(Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
            {
                $wishlist = Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
                $wishlist->delete();
                return response()->json(['status' => $product->name." Item Removed from Wishlist"]);
            }
        }
        else
        {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

}
