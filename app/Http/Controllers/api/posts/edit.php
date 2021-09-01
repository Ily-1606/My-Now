<?php

namespace App\Http\Controllers\api\posts;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class edit extends Controller
{
    public function __construct()
    {
        $this->middleware("isAdmin");
    }
    public function edit(Request $request)
    {
        $user = Auth::user()->id;
        $post = Posts::where("id",'=',$request->get('id'))->where("owner",'=',$user)->first();
        if($post){
            $post->name = $request->post("name");
            $post->body = $request->post("body");
            $post->money = $request->post("money");
            $post->sales = $request->post("sales");
            $post->location = json_encode($request->post("location"));
            $post->salary = $request->post("salary");
            $post->save();
            return response()->json([
                "status"=> true,
                "msg"=> "Đã cập nhật sản phẩm thành công!"
            ]);
        }
        else{
            return response()->json([
                "status"=> false,
                "msg"=> "Sản phẩm không tồn tại!"
            ],404);
        }
    }
}
