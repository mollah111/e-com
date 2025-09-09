<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function allOrderList ()
    {
        $orders = Order::with('orderDetails')->get();
        return view('backend.order.all-order-list', compact('orders'));
    }

    public function editOrder ($id)
    {
        $order = Order::with('orderDetails')->where('id', $id)->first();
        return view('backend.order.edit-order', compact('order'));
    }

    public function updateOrder (Request $request, $id)
    {
        $order = Order::find($id);

        $order->c_name = $request->c_name;
        $order->c_phone = $request->c_phone;
        $order->address = $request->address;
        $order->area = $request->area;
        $order->courier_name = $request->courier_name;
        $order->price = $request->price;

        $order->save();
        return redirect()->back();
    }

    public function updateOrderStatus ($status, $id)
    {
        $order = Order::find($id);
        $order->status = $status;

        $order->save();
        return redirect()->back();
    }
}

