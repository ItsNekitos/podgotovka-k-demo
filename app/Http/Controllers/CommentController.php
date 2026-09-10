<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(CommentRequest $request, Order $order)
    {
        $comment = new Comment();
        $comment->order_id = $order->id;
        $comment->user_id = Auth::user()->id;
        $comment->description = $request->description;
        $comment->save();
        return back();
    }
}
