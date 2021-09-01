<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logout extends Controller
{
    public function __construct()
    {
        $this->middleware("web");
    }
    public function logout()
    {
        if (Auth::check()) Auth::logout();
        return response()->json([
            "status" => true,
            "msg" => "Đăng xuất thành công"
        ]);
    }
}
