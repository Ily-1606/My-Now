<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class info extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function info()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return response()->json(
                [
                    "status" => true,
                    "image" => $user->avatar,
                    "role"  => $user->user_type,
                    "fullname" => $user->name
                ]
            );
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Vui lòng đăng nhập và thử lại!"
            ], 401);
        }
    }
}
