<?php

namespace App\Http\Controllers\api\bills;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\api\posts\info as InfoPost;

class show extends Controller
{
    public function __construct()
    {
        $this->middleware("web");
    }
    public function show(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->user_type == "admin" || $user->user_type == "seller") {
                if ($user->user_type == "seller")
                    $bills = Bill::join('posts', 'bills.product_id', 'posts.id')->where("posts.owner","=",$user->id)
                        ->select("bills.id", "bills.product_id", "bills.address", "bills.numberphone", "bills.note", "bills.money", "bills.status", "bills.created_at as order_time", "posts.files", "posts.name", "posts.salary")->orderByDesc("bills.created_at")->get();
                else
                    $bills = Bill::join('posts', 'bills.product_id', 'posts.id')
                        ->select("bills.id", "bills.product_id", "bills.address", "bills.numberphone", "bills.note", "bills.money", "bills.status", "bills.created_at as order_time", "posts.files", "posts.name", "posts.salary")->orderByDesc("bills.created_at")->get();
            } else {
                $bills = Bill::where("bills.owner", "=", $user->id)->join('posts', 'bills.product_id', 'posts.id')
                    ->select("bills.id", "bills.product_id", "bills.address", "bills.numberphone", "bills.note", "bills.money", "bills.status", "bills.created_at as order_time", "posts.files", "posts.name", "posts.salary")->orderByDesc("bills.created_at")->get();
            }
            $data = [];
            foreach ($bills as $bill) {
                $bill->url = "/product/" . InfoPost::to_slug($bill->name) . "-" . $bill->product_id . ".html";
                array_push($data, $bill);
            }
            return response()->json([
                "status" => true,
                "data" => $data
            ]);
        } else {
            return response()->json([
                "status" => false,
                "msg"   => "Vui lòng đăng nhập!"
            ], 400);
        }
    }
}
