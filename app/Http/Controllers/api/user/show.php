<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class show extends Controller
{
    public function __construct()
    {
        $this->middleware("isAdmin");
    }
    public function show(Request $request)
    {
        $post = DB::table("users")->orderBy('created_at','desc')->paginate(10,['id','name','email','avatar','user_type']);
        return response()->json($post);
    }
}
