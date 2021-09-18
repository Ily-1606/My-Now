<?php

namespace App\Http\Controllers\api\categorys;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class create extends Controller
{
    public function __construct()
    {
        $this->middleware("isAdmin");
    }
    public function create(Request $request)
    {
        if ($request->post("name_category")) {
            $categorys = Category::create([
                "name" => $request->post("name_category")
            ]);
            if ($categorys) {
                return response()->json([
                    "status" => true,
                    "msg" => "Thêm thành công!"
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "msg" => "Lỗi nội bộ!"
                ],500);
            }
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Missing parameter!"
            ], 404);
        }
    }
}
