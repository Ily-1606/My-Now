<?php

namespace App\Http\Controllers\api\posts;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\api\locations\get as getLocation;
use App\Models\Category;

class info extends Controller
{
    public function __construct()
    {
        $this->middleware("web");
    }
    public function info(Request $request)
    {
        if ($request->has("id")) {
            $id = $request->get('id');
            $post = Posts::select(
                    'posts.id',
                    'posts.name',
                    'posts.body',
                    'posts.sales',
                    'posts.salary',
                    'posts.money',
                    'posts.files',
                    'posts.location',
                    "posts.status",
                    "posts.categorys",
                    "posts.detail_infomation",
                    "posts.total_star",
                    "posts.avg_star",
                    "posts.sold",
                )
                ->where('posts.id', '=', $id)->first();
            $post = json_encode($post);
            $post = json_decode($post, true);
            $post["moneyF"] = $post["money"] - $post["sales"];
            $province = getLocation::getLocationFromID($post["location"]);
            if ($province) {
                $post["location"] = $province;
            }
            for($i = 0; $i < count($post["categorys"]); $i++){
                $category = $post["categorys"][$i];
                $db_category = Category::where("id","=",$category)->select("id","name")->first();
                $db_category["url"] = "/category/".$db_category["id"];
                $post["categorys"][$i] = $db_category;
            }
            if ($post) {
                return response()->json([
                    "status" => true,
                    "data" => $post
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "msg" => "Sản phẩm không tồn tại"
                ], 404);
            }
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Sản phẩm không tồn tại"
            ], 404);
        }
    }
    public static function to_slug($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
}
