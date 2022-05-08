<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function user()
    {
        $user = User::all();
        return view('admin.user.index',compact('user'));
    }

    public function viewuser($id)
    {
        $user = User::find($id);
        return view('admin.user.view',compact('user'));
    }
}
