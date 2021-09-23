<?php

namespace App\Http\Controllers\api\posts;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\api\posts\info as InfoPost;
use Illuminate\Support\Facades\Auth;

class show extends Controller
{
    public function show(Request $request)
    {
        $perpage = 10;
        if ($request->get("perpage"))
            $perpage = $request->get("perpage");
        $wheres = [];
        $orderBy = "";
        if ($request->get("sale")) {
            array_push($wheres, array("sales", ">", "0"));
        }
        if ($request->get("location")) {
            array_push($wheres, array("location", "=", $request->get("location")));
        }
        if ($request->get("orderBy") == "hot") {
            $orderBy = "sold desc,";
        }
        $orderBy .= " updated_at desc";
        //echo $orderBy;
        if ($request->get("userId") || Auth::user()->user_type == "selller") {
            $post = DB::table("posts")->where("owner", '=', $request->get("userId"))->orderBy('updated_at', 'desc')->paginate($perpage, ['id', 'name', 'body', 'location', 'files', 'money', 'salary', 'sold', 'sales'])->appends(request()->query());
        }else {
            $post = DB::table("posts")->where($wheres)->orderByRaw($orderBy)->paginate($perpage, ['id', 'name', 'body', 'location', 'files', 'money', 'salary', 'sold', 'sales'])->appends(request()->query());
        }
        //add link 
        $post = json_encode($post);
        $post = json_decode($post, true);
        for ($i = 0; $i < count($post["data"]); $i++) {
            $post["data"][$i]["link"] = "/product/".InfoPost::to_slug($post["data"][$i]["name"])."-".$post["data"][$i]["id"].".html";
        }
        return response()->json($post);
    }
}
