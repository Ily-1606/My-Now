<?php

namespace App\Http\Controllers\api\cart;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Controllers\api\posts\info as InfoPost;
use Carbon\Carbon;

class remember extends Controller
{
    public function __construct()
    {
        $this->middleware("web");
    }
    public function set(Request $request)
    {
        if ($request->get("id") && $request->get("salary")) {
            $product_id = $request->get("id");
            $salary = $request->get("salary");
            $cart = [];
            $session = new Session();
            if ($session->get("cart"))
                $cart = $session->get("cart");
            $checkSum = true;
            $product = Posts::select('id', 'name', 'body', 'sales', 'salary', 'money', 'files',)
                ->where('id', '=', $product_id)->first();
            $total_money = $salary * ($product->money - $product->sales);
            $now = Carbon::now();
            $data = array(
                "product_id" => $product_id,
                "salary" => $salary,
                "total_money" => $total_money,
                "money" => $product->money,
                "sales" => $product->sales,
                "data_product" => $product,
                "order_time" => $now->format('H:i:s d/m/Y'),
                "url" => "/product/" . InfoPost::to_slug($product->name) . "-" . $product_id . ".html",
            );
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]["product_id"] == $product_id) {
                    $cart[$i] = $data;
                    $checkSum = false;
                    break;
                }
            }
            if ($checkSum) {
                array_push($cart, $data);
            }
            $session->set("cart", $cart);
        }
    }
    public function get(Request $request)
    {
        $session = new Session();
        //$session->clear();
        $cart = [];
        if($session->get("cart")){
            $cart = $session->get("cart");
            $cart = array_values($cart);
        }
        $total_order_money = 0;
        if ($request->get("type") == "count") {
            return response()->json([
                "status" => true,
                "count" => count($cart)
            ]);
        }
        foreach($cart as $item){
            $total_order_money += $item["total_money"];
        }
        return response()->json([
            "status" => true,
            "data" => $cart,
            "total_order_money" => $total_order_money
        ]);
    }
    public function remove(Request $request)
    {
        if ($request->get("product_id")) {
            $session = new Session();
            $cart = $session->get("cart");
            if ($cart == null)
                $cart = [];
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]["product_id"] == $request->get("product_id")) {
                    unset($cart[$i]);
                }
            };
            $cart = array_values($cart);
            $cart = $session->set("cart",$cart);
        }
        return response()->json([
            "status" => true,
            "data" => $session->get("cart")
        ]);
    }
}
