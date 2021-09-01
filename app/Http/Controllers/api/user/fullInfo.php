<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class fullInfo extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function fullInfo(Request $request)
    {
        $user = User::find($request->get("id"));
        if ($user) {
            return response()->json([
                "status" => true,
                "data" => $user
            ]);
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Người dùng không tồn tại!"
            ], 404);
        }
    }
}
