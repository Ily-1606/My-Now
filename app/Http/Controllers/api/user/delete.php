<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class delete extends Controller
{
    public function __construct()
    {
        $this->middleware("web");
    }
    public function delete(Request $request)
    {
        $userInfo = Auth::user();
        if ($userInfo->id == $request->get("id") || $userInfo->user_type == "admin") {
            $user = User::find($request->get("id"));
            $user->posts()->delete();
            $user->delete();
            if ($userInfo->id == $request->get("id")) {
                Auth::logout();
            }
            return response()->json([
                "status" => true,
                "msg" => "Đã xóa tài khoản"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "msg"   => "Access denied!"
            ], 403);
        }
    }
}
