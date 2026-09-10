<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order()
    {
        $orders = Order::where("user_id", Auth::id())->get();
        return view('userprofile', compact('orders'));
    }
    
    public function orderform(OrderRequest $request){
            $order = new Order();

            $order->user_id = Auth::user()->id;
            $order->place_name = $request->place_name;
            $order->date = $request->date;
            $order->oplata = $request->oplata;
            $order->save();
            return redirect()->route('order');
    }
    public function orderview()
    {
        return view("order");
    }
}
