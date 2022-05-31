<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get();
        /* $trending_category = Category::where('popular', '1')->take(15)->get(); */
        $trending_category = Category::all();
        return view('frontend.index',compact('featured_products','trending_category'));
    }

    public function category()
    {
        $category = Category::where('status', '0')->get();
        return view('frontend.category',compact('category'));
    }

    public function viewcategory($slug)
    {
        if(Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $product = Product::where('cate_id', $category->id)->where('status', '0')->get();
            return view('frontend.product.index',compact('category','product'));
        }
        else
        {
            return redirect('/category')->with('status',"Detail Category Doesnt Exists");
        }
    }

    public function viewproduct($cate_slug, $prod_slug)
    {
        if(Category::where('slug', $cate_slug)->exists())
        {
            if(Product::where('slug', $prod_slug)->exists())
            {
                $product = Product::where('slug', $prod_slug)->first();
                $rating = Rating::where('prod_id', $product->id)->get();
                $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
                $user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();
                $review = Review::where('prod_id', $product->id)->get();

                if($rating->count() > 0)
                {
                    $rating_value = $rating_sum/$rating->count();
                }
                else
                {
                    $rating_value = 0;
                }
                return view('frontend.product.view',compact('product','rating','rating_value','user_rating','review'));
            }
            else
            {
                return redirect('/category/'.$cate_slug)->with('status',"Detail Product Doesnt Exists");
            }
        }
        else
        {
            return redirect('/category')->with('status',"Detail Category Doesnt Exists");
        }
    }

    public function productlistAjax()
    {
        $product = Product::select('name')->where('status', '0')->get();
        $data = [];

        foreach ($product as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }

    public function searchProduct(Request $request)
    {        
        $searched_product = $request->product_name;
        if($searched_product != "")
        {
            $product = Product::where("name","LIKE","%$searched_product%")->first();
            if($product)
            {
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }
            else
            {
                return redirect()->back()->with("status","No Products matched your search");
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    
}
