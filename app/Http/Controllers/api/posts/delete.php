<?php

namespace App\Http\Controllers\api\posts;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class delete extends Controller
{
    public function __construct()
    {
        $this->middleware("isAdmin");
    }
    public function delete(Request $request)
    {
        $post = Posts::find($request->get('id'));
        if ($post) {
            $files = json_decode($post->files, true);
            foreach ($files as $file) {
                if (Storage::disk("public_uploads")->exists($file))
                    Storage::disk("public_uploads")->delete($file);
            }
            $post->delete();
            return response()->json([
                "status" => true,
                "msg" => "Xoá sản phẩm thành công!"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "msg"   => "Sản phẩm không tồn tại!"
            ], 404);
        }
    }
}
