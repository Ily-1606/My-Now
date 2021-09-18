<?php

namespace App\Http\Controllers\api\categorys;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class delete extends Controller
{
    public function __construct()
    {
        $this->middleware("isAdmin");
    }
    public function delete(Request $request)
    {
        if ($request->get("id")) {
            $category = Category::find($request->get("id"));
            if ($category) {
                $category->delete();
                return response()->json([
                    "status" => true,
                    "msg" => "Xóa thành công!"
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "msg" => "Có lỗi khi xóa!"
                ], 500);
            }
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Missing parameter!"
            ], 404);
        }
    }
}
