<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::where('status','0')->get();
        return view('admin.order.index',compact('order'));
    }

    public function view($id)
    {
        $order = Order::where('id',$id)->first();
        return view('admin.order.view',compact('order'));
    }

    public function updateorder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->input('order_status');
        $order->update();        
        return redirect('/order')->with('status',"Order Updated Successfully");
    }

    public function orderhistory()
    {
        $order = Order::where('status','1')->get();
        return view('admin.order.history',compact('order'));
    }

}
