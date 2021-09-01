<?php

namespace App\Http\Controllers\api\upload;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class avatar extends Controller
{
    public function __construct()
    {
        $this->middleware("web");
    }
    public function upload(Request $request)
    {
        if (Auth::check()) {
            $rules = array(
                'image' => 'mimes:jpeg,jpg,png,gif,svg
                            |required
                            |max:5120
                '
            );
            $validator = Validator::make($request->all(), $rules);
            $errors = $validator->errors();
            if ($validator->fails()) {
                return response()->json([
                    "status" => false,
                    "msg" => $errors->first()
                ], 500);
            }
            $path = $request->file("image")->store("uploads/avatars", ['disk' => "public_uploads"]);
            if ($path) {
                $user = Auth::user();
                $user = User::find($user->id);
                if (Storage::disk("public_uploads")->exists($user->avatar))
                    Storage::disk("public_uploads")->delete($user->avatar);
                $user->avatar = $path;
                $user->save();
                return response()->json([
                    "status" => true,
                    "fullname" => $user->name,
                    "image" => $user->avatar,
                    "msg" => "Cập nhật hình đại diện thành công!"
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "msg" => "Something went wrong!"
                ], 500);
            }
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Access denied!"
            ], 403);
        }
    }
}
