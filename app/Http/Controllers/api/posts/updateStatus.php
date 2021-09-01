<?php

namespace App\Http\Controllers\api\posts;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class updateStatus extends Controller
{
    public function __construct()
    {
        $this->middleware("isAdmin");
    }
    public function update(Request $request)
    {
        $post = Posts::find($request->get("id"));
        if ($post) {
            $post->status = $request->get('status');
            $post->save();
            return response()->json([
                "status" => true,
                "msg"   => "Cập nhật thành công"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Sản phẩm không tồn tại!"
            ], 404);
        }
    }
}
