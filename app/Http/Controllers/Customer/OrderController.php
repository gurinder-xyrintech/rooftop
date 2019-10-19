<?php

namespace App\Http\Controllers\Customer;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //Show all orders
    public function index()
    {
        return Order::where('user_id',Auth::id())->get();
    }

    //Show specific order
    public function show($id)
    {
        return Order::whereId($id)->where('user_id',Auth::id())->first();
    }

    //Store order
    public function store(Request $request)
    {
        $this->validateData($request->all(), Order::validationRules());

        Order::store($request);
    }

    //Update order
    public function update(Request $request, $id)
    {
        $order = Order::whereId($id)->where('user_id',Auth::id())->first();

        $order->updateOrder($request);
    }

    //Delete order
    public function delete($id)
    {
        Order::whereId($id)->where('user_id',Auth::id())->delete();
    }

}
