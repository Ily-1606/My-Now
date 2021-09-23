<?php

namespace App\Http\Controllers\api\posts;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $user = Auth::user();
            if ($user->user_type == "seller") {
                if ($post->owner != $user->id)
                    return;
            }
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
