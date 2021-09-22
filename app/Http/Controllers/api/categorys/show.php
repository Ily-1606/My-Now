<?php

namespace App\Http\Controllers\api\categorys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class show extends Controller
{
    public function list(Request $request)
    {
        $perpage = 10;
        if ($request->get("perpage")) {
            $perpage = $request->get("perpage");
        }
        $categorys = DB::table("categories")->orderByDesc("created_at")->paginate($perpage, ['id', 'name'])->appends(request()->query());
        return response()->json($categorys);
    }
}
