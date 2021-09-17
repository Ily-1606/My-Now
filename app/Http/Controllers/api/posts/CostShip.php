<?php

namespace App\Http\Controllers\api\posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\functions\Distance;
use App\Models\Posts;

class CostShip extends Controller
{
    public function cost(Request $request)
    {
        if ($request->get("id") && $request->get("lat") && $request->get("long")) {
            $post = Posts::join("users", "posts.owner", "=", "users.id")
                ->select('posts.sales', 'posts.salary', 'posts.money', "users.longitude", "users.latitude")
                ->where('posts.id', '=', $request->get("id"))->first();
            if ($post) {
                $distance = new Distance();
                $km = $distance->distance($post["latitude"], $post["longitude"], $request->get("lat"), $request->get("long"));
                $cost_ship = round($distance->cost_ship($km));
                return response()->json([
                    "status" => true,
                    "data" => [
                        "cost_ship" => $cost_ship,
                    ]
                ]);
            }
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Missing parameter"
            ], 404);
        }
    }
}
