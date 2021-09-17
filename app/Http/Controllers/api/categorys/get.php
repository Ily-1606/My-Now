<?php

namespace App\Http\Controllers\api\categorys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class get extends Controller
{
    public function getWithPagination(Request $request)
    {
        $perpage = 10;
        if ($request->get("perpage"))
            $perpage = $request->get("perpage");
        $categories = DB::table("categories")->orderByDesc("created_at")->paginate($perpage, ['id', 'name'])->appends(request()->query());
        return response()->json($categories);
    }
}
