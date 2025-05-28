<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $orders = Auth::user()->orders()->get();
        return view('dashboard', compact('orders'));
    }
}
