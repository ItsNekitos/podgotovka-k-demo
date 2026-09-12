<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegRequest;
use App\Models\Comment;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->save();
        Auth::login($user);
        return redirect()->route('homepage');
    }

    public function login(AuthRequest $request)
    {
        $user = User::where('name', $request->name)->first();
        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('homepage');
        }

        return back()->withInput()->withErrors(['password' => 'Неверный логин или пароль']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('homepage');
    }
    public function viewregister()
    {
        return view("register");
    }
       public function viewlogin()
    {
        return view("login");
    }
    public function homepage()
    {
        return view("index");
    }
    public function userprofileview()
    {
        $orders = Order::where("user_id", Auth::id())->get();
        $comments = Comment::all();
        return view('userprofile', compact('orders', 'comments'));
    }
    public function adminpanel()
    {
        $orders = Order::all();
        return view('adminpanel', compact('orders'));
    }
}