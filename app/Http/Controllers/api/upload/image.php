<?php

namespace App\Http\Controllers\api\upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class image extends Controller
{
    public function __construct()
    {
        $this->middleware("isAdmin");   
    }
    public function upload(Request $request)
    {
        $path = $request->file("file")->store("uploads/product_images",['disk'=>"public_uploads"]);
        return response()->json([
            "name"=>"image.png",
            "status"=> "done",
            "url"=>"$path"
        ]);
    }
}
