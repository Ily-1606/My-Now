<?php

namespace App\Http\Controllers\api\search;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class categorys extends Controller
{
    public function search(Request $request)
    {
        $q = $request->get("q");
        if ($q) {
            $categorys = Category::where("name", "LIKE", $q)->select("id", "name")->skip(0)->take(10)->get();
            return response()->json([
                "status" => true,
                "data"  => $categorys
            ]);
        } else {
            return response()->json([
                "status" => false,
                "msg"   => "Missing parameter!"
            ], 404);
        }
    }
}
