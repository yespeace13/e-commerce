<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\SessionOrder;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index(): View
    {
        $order = Session::get('order');
        if ($order == null) {
            $order = new SessionOrder();
            Session::put('order', $order);
        }
        return view('purchase.orders', compact('order'));
    }

    public function addItem(Request $request)
    {
        $productId = $request['productId'];
        $quantity = $request['quantity'];
        if ($productId == null) {
            return redirect('/orders')->with('error', 'Please select product');
        }
        if ($quantity == null) {
            $quantity = 1;
        }
        $product = Product::find($productId);
        $order = Session::get('order');
        if ($order == null) {
            $order = new SessionOrder();
            Session::put('order', $order);
        }
        $order->addItem($product, $quantity);
        return redirect()->back();
    }

    public function changeQuantity(Request $request): void
    {
        $productId = $request['productId'];
        $quantity = $request['quantity'];
        if ($quantity == null) {
            $quantity = 1;
        }
        $order = Session::get('order');
        $order->changeQuantityItem($productId, $quantity);
    }

    public function removeItem(Request $request): void
    {
        $productId = $request['productId'];
        $order = Session::get('order');
        $order->removeItem($productId);
    }

    public function purchase(Request $request): RedirectResponse
    {
        $user = User::find(Auth::user()->id);
        $user->address = $request['address'];
        $user->save();

        // 2 - оплачен
        // 3 - заказ не завершен
        $status = $request['status'] == 'success' ? 2 : 3;


        if($request->order_id != null){
            $order = Order::find($request->order_id);
            $order->order_status_id = $status;
            $order->save();
            return redirect()->route('dashboard');
        }
        $order = Session::get('order');



        $savedOrder = Order::create([
            'order_status_id' => $status,
            'user_id' => $user->id,
        ]);

        foreach ($order->getItems() as $orderItem) {
            OrderItem::create([
                'order_id' => $savedOrder->id,
                'product_id' => $orderItem->getProduct()->id,
                'quantity' => $orderItem->getQuantity(),
                'price_at_purchase' => $orderItem->getProduct()->price,
            ]);
            // если успешно, то уменьшаем количество
            if ($status == 2) {
                $product = $orderItem->getProduct();
                $product->stock_quantity -= $orderItem->getQuantity();
                $product->save();
            }
        }

        Session::forget(['order']);

        return redirect()->route('dashboard');
    }
}
