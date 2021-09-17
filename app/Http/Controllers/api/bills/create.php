<?php

namespace App\Http\Controllers\api\bills;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class create extends Controller
{
    public function __construct()
    {
        $this->middleware("web");
    }
    public function create(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                "status" => false,
                "msg"  => "Vui lòng đăng nhập trước để thực hiện hành động này!"
            ], 403);
        }
        if ($request->post("product_id_ordering") && $request->post("dataLocation") && $request->post("dataPhone")) {
            $user = Auth::user();
            $product_id_ordering = $request->post("product_id_ordering");
            $dataLocation = $request->post("dataLocation");
            $dataPhone = $request->post("dataPhone");
            $orderNote = $request->post("orderNote");
            if ($product_id_ordering == "all") {
                $this->orderAll(function ($cart) use ($user, $dataLocation, $dataPhone, $orderNote) {
                    for ($i = 0; $i < count($cart); $i++) {
                        $product = $cart[$i];
                        Bill::create([
                            "owner" => $user->id,
                            "product_id" => $product["product_id"],
                            "salary" => $product["salary"],
                            "address" => $dataLocation,
                            "numberphone" => $dataPhone,
                            "note"  => $orderNote,
                            "money" =>  $product["total_money"],
                            "status" => "created",
                            "cost_ship" => $product["cost_ship"]
                        ]);
                    }
                    $cart = [];
                    $session = new Session();
                    $session->set("cart", $cart);
                });
            } else {
                $product = $this->getProduct($product_id_ordering, true);
                Bill::create([
                    "owner" => $user->id,
                    "product_id" => $product["product_id"],
                    "address" => $dataLocation,
                    "salary" => $product["salary"],
                    "numberphone" => $dataPhone,
                    "note"  => $orderNote,
                    "money" =>  $product["total_money"],
                    "status" => "created",
                    "cost_ship" => $product["cost_ship"]
                ]);
            }
            return response()->json([
                "status" => true,
                "msg"   => "Đã đặt hàng thành công!"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Thiếu dữ liệu"
            ], 404);
        }
    }
    public function getProduct($id, $delete = false)
    {
        $session = new Session();
        $cart = $session->get("cart");
        if ($cart) {
            for ($i = 0; $i < count($cart); $i++) {
                $item = $cart[$i];
                if ($item["product_id"] == $id) {
                    if ($delete) {
                        unset($cart[$i]);
                        $cart = array_values($cart);
                        $session->set("cart", $cart);
                    }
                    return $item;
                }
            }
        } else
            return response()->json([
                "status" => false,
                "msg" => "Có lỗi không hợp lệ trên hệ thống!"
            ], 500);
    }
    public function orderAll($callback)
    {
        $session = new Session();
        $cart = $session->get("cart");
        if ($cart) {
            $callback($cart);
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Có lỗi không hợp lệ trên hệ thống!"
            ], 500);
        }
    }
}
