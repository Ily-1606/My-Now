<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    public function __construct()
    {
        $this->middleware("web");
    }
    public function login(Request $request)
    {
        $info = [
            "email" => $request->post("email"),
            "password" => $request->post("password")
        ];
        //dd(Auth::attempt($info));
        if (Auth::attempt($info, $request->post("remember"))) {
            $user = Auth::user();
            return response()->json([
                "status" => true,
                "image" => $user->avatar,
                "fullname" => $user->name,
                "msg" => "Đăng nhập thành công!"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Sai tên đăng nhập hoặc mật khẩu!"
            ], 400);
        }
    }
}
