<?php

namespace App\Http\Controllers\api\locations;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class countNear extends Controller
{
    public function count(Request $request)
    {
        $location = $request->get("location_id");
        if ($location) {
            $data = Posts::where("location", $location)->count();
            return response()->json([
                "status" => true,
                "data" => array(
                    "count" => $data
                )
            ]);
        }
        return response()->json([
            "status" => false,
            "message" => "Missed parameter"
        ]);
    }
}
