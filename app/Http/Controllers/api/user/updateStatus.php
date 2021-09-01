<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class updateStatus extends Controller
{
    public function __construct()
    {
        $this->middleware("isAdmin");
    }
    public function update(Request $request)
    {
        $user = User::find($request->get("id"));
        if($user){
            $user->user_type = $request->get("user_type");
            $user->status = $request->get("status");
            $user->save();
            return response()->json([
                "status" => true,
                "msg" => "Cập nhật thành công!"
            ]);
        }
        else{
            return response()->json([
                "status" => false,
                "msg" => "Người dùng không tồn tại!"
            ],404);
        }
    }
}
