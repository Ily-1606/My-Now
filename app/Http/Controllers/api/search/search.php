<?php

namespace App\Http\Controllers\api\search;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\api\posts\info as InfoPost;
use App\Http\Controllers\api\locations\get as Location;

class search extends Controller
{
    public function search(Request $request)
    {
        $q = $request->get("q");
        if($q){
            $result = Posts::where("name","LIKE", "%$q%")->select("id","sales","files","name","body","location","avg_star","total_star","money","salary","sold")->get();
            $data = [];
            foreach($result as $item){
                $item->location = Location::getLocationFromID($item->location);
                $item->url = "/product/".InfoPost::to_slug($item->name)."-".$item->id.".html";
                array_push($data,$item);
            }
            return response()->json([
                "status" => true,
                "data" => $data
            ]);
        }
        else{
            return response()->json([
                "status" => false,
                "msg" => "Thiếu dữ liệu truyền vào!"
            ],400);
        }
    }
}
