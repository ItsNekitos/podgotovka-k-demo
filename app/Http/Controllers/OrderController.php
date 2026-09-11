<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderEditRequest;
use App\Http\Requests\OrderRequest;
use App\Models\Comment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order()
    {
        $orders = Order::where("user_id", Auth::id())->get();
        $comments = Comment::all();
        return view('userprofile', compact('orders', 'comments'));
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
    public function orderedit(OrderEditRequest $request, $id){
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();
        return back();
    }
    public function orderview()
    {
        return view("order");
    }
}
