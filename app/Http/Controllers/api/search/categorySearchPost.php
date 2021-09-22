<?php

namespace App\Http\Controllers\api\search;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\api\posts\info as InfoPost;

class categorySearchPost extends Controller
{
    public function search(Request $request)
    {
        $id_category = $request->get("category_id");
        $id_province = $request->get("province_id");
        if ($id_category) {
            //[$id], [$id1,$id2], [$id1,$id,$id3]
            $post = Posts::where(function($query) use($id_category){
                $query->where("categorys","LIKE","%$id_category,%");
                $query->orWhere("categorys","LIKE","%,$id_category%");
                $query->orWhere("categorys","LIKE","%$id_category]%");
            })
            ->where("location","=","$id_province")
            ->get();
            $category_data = Category::where("id","=",$id_category)->select("id","name")->first();
            $data = [];
            foreach($post as $item){
                $item->url = "/product/".InfoPost::to_slug($item->name)."-".$item->id.".html";
                array_push($data,$item);
            }
            return response()->json([
                "status" => true,
                "data"  => array(
                    "data_category" => $category_data,
                    "data_search"   => $post)
            ]);
        } else {
            return response()->json([
                "status" => false,
                "msg"   => "Missing parameter"
            ], 404);
        }
    }
}
