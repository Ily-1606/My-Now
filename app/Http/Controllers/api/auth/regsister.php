<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class regsister extends Controller
{
    public function __construct()
    {
        $this->middleware("web");
    }
    public function regsister(Request $request)
    {
        if (!Auth::check()) {
            $rules= [
                'email' => "required|unique:users|max:255|email",
                'name' => "required|min:10",
                'password' => "required|min:10|confirmed",
            ];
            $messages = [
                'required' => ':attribute không được để trống',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Email này đã được sử dụng',
                'min' => ':attribute ít nhất :min ký tự',
                'password.confirmed' => 'Mật khẩu không khớp',
            ];
            $attributes = [
                'email' => "Email",
                "name" => "Tên người dùng",
                "password" => "Mật khẩu"
            ];
            $validator = Validator::make($request->all(), $rules, $messages, $attributes);
            $errors = $validator->errors();
            if($validator->fails()){
                return response()->json([
                    "status" => false,
                    "msg" => $errors->first()
                ]);
            }
            $id = User::insertGetId([
                "email" => $request->get("email"),
                "name" => $request->get("name"),
                "password" => $request->get("password")
            ]);
            if ($id) {
                $user = User::find($id);
                Auth::login($user, true);
                return response()->json([
                    "status" => true,
                    "msg" => "Đăng ký thành công!",
                    "image" => $user->avatar,
                    "fullname" => $user->name
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "msg" => "Có lỗi khi đăng ký tài khoản"
                ], 500);
            }
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Vui lòng đăng xuất để tiếp tục"
            ], 403);
        }
    }
}
