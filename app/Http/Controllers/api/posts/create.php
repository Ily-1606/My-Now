<?php

namespace App\Http\Controllers\api\posts;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class create extends Controller
{
    public function __construct()
    {
        $this->middleware("isAdmin");
    }
    public function create(Request $request)
    {
        $require_params = [
            "name",
            "body",
            "location",
            "files",
            "sales",
            "money",
            "salary",
            "categorys"
        ];
        if($request->hasAny($require_params)){
            $user = Auth::user()->id;
            $post = Posts::create([
                'name'=> $request->post("name"),
                "body"=> $request->post("body"),
                "location"=> $request->post("location"),
                "categorys"=> $request->post("categorys"),
                "files" => json_encode($request->post("files")),
                "sales"=> $request["sales"],
                "money" => $request["money"],
                "salary"=> $request["salary"],
                "owner"=> $user
            ]);
            if($post){
                return response()->json([
                    "status" => true,
                    "msg" => "Đăng thành công!!!"
                ]);
            }
            else{
                return response()->json([
                    "status" => false,
                    "msg" => "Không thể đăng sản phẩm, vui lòng thử lại sau!!!"
                ],500);
            }
        }
        else{
            return response()->json([
                "status"=>false,
                "msg" => "Thiếu dữ liệu, vui lòng thử lại!"
            ],403);
        }
    }
}
