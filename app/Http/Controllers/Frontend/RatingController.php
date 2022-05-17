<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        $star_rated = $request->input('product_rating');
        $product_id = $request->input('product_id');
        if(Auth::check())
        {
            $prod_check = Product::where('id',$product_id)->where('status','0')->first();

            if($prod_check)
            {
                $verified_purchase = Order::where('orders.user_id',Auth::id())
                                        ->join('orders_items','orders.id','orders_items.order_id')
                                        ->where('orders_items.prod_id',$product_id)->get();

                if($verified_purchase->count()>0)
                {
                    $existing_rating = Rating::where('user_id', Auth::id())->where('prod_id',$product_id)->first();
                    if($existing_rating)
                    {
                        $existing_rating->stars_rated = $star_rated;
                        $existing_rating->update();
                    }
                    else
                    {
                        Rating::create([
                            'user_id' => Auth::id(),
                            'prod_id' => $product_id,
                            'stars_rated' => $star_rated,
                        ]);
                    }
                    return redirect()->back()->with('status', "Thank You for Rating this product");
                }
                else
                {
                    return redirect()->back()->with('status', "You Cannot rate a product without purchase");
                }    
            }
            else
            {
                return redirect()->back()->with('status', "The link you followed was broken");
            }    
        }
        else
        {
            return response()->json(['status' => "Login to Continue"]);
        }
    }
}
