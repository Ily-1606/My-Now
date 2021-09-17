<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class update extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function update(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->user_type == "admin" && $request->get("ref") != "profile") { //In admin page
                $user = User::find($request->get("id"));
                $user->name = $request->post("name");
                $user->email = $request->post("email");
                if ($request->post("long") && $request->post("lat")) {
                    $user->longitude = $request->post("long");
                    $user->latitude = $request->post("lat");
                }
                $user->save();
                return response()->json([
                    "status" => true,
                    "msg" => "Cập nhật thành công!"
                ]);
            } else { //In user profile
                $validator = $this->store($request);
                if ($validator) return $validator;
                $user = User::find($user->id);
                $user->name = $request->post("name");
                $user->email = $request->post("email");
                $user->save();
                return response()->json([
                    "status" => true,
                    "msg" => "Cập nhật thông tin cá nhân thành công!",
                    "image" => $user->avatar,
                    "fullname" => $user->name
                ]);
            }
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Vui lòng đăng nhập và thử lại!"
            ], 403);
        }
    }
    public function store(Request $request)
    {
        $rules = [
            'email' => "required|unique:users|max:255|email",
            'name' => "required|min:10",
        ];
        $messages = [
            'required' => ':attribute không được để trống',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email này đã được sử dụng',
            'min' => ':attribute ít nhất :min ký tự',
        ];
        $attributes = [
            'email' => "Email",
            "name" => "Tên người dùng",
        ];
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);
        $errors = $validator->errors();
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "msg" => $errors->first()
            ], 500);
        }
    }
    public function updateCoord(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user = User::find($user->id);
            if ($request->post("long") && $request->post("lat")) {
                $user->longitude = $request->post("long");
                $user->latitude = $request->post("lat");
            }
            $user->save();
            return response()->json([
                "status" => true,
                "msg" => "Cập nhật thành công!"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Vui lòng đăng nhập và thử lại!"
            ], 403);
        }
    }
}
