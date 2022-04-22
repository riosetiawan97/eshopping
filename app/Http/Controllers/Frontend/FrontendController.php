<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

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
                return view('frontend.product.view',compact('product'));
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

}
