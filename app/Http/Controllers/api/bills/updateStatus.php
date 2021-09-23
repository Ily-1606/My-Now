<?php

namespace App\Http\Controllers\api\bills;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class updateStatus extends Controller
{
    public function __construct()
    {
        $this->middleware("isAdmin");
    }
    public function update(Request $request)
    {
        $id = $request->get("id");
        $status = $request->get("status");
        if ($id && $status) {
            $user = Auth::user();
            $bill = Bill::find($id);
            if ($user->user_type == "selller") {
                $post = Posts::find($bill->product_id);
                if ($post->owner != $user->id)
                    return;
            }
            $bill->status = $status;
            $bill->save();
            return response()->json([
                "status" => true,
                "msg"   => "Cập nhật thành công!"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Missing parameter"
            ], 404);
        }
    }
}
