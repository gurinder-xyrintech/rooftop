<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //Show all orders for admin
    public function index()
    {
        return Order::all();
    }

    //Admin can update order
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        $order->updateOrder($request);
    }

    //Admin can delete order
    public function delete($id)
    {
        Order::findOrFail($id)->delete();
    }
}
