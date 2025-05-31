<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function complete(Request $request)
    {
        $orderId = $request['order_id'];
        $order  = Order::find($orderId);
        $order->update(['order_status_id' => 4]);
        $order->save();

        return redirect('/admin/');
    }

    public function remove(Request $request)
    {
        $orderId = $request['order_id'];
        $order  = Order::find($orderId);
        $order->update(['order_status_id' => 5]);
        $order->save();
        return redirect('/admin/');
    }

}
