<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegRequest $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return response()->json(["token" => $user->createToken('api')->plainTextToken]);
    }

    public function login(AuthRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return response()->json(['token' => $user->createToken('api')->plainTextToken]);
        } else {
            return response()->json(['errors' => ["password" => ["Неверный email или пароль"]]]);
        }
    }
    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json(['message' => 'ok']);
    }
    public function viewregister()
    {
        return view("register");
    }
}
