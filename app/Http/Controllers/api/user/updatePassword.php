<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class updatePassword extends Controller
{
    public function __construct()
    {
        $this->middleware("web");
    }
    public function update(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user = User::find($user->id);
            if ($user->generation_password == 1) { //Login with social
                $validator = $this->rules_($request);
                if ($validator)
                    return $validator;
            } else { //Regsister in website
                $validator = $this->rules($request);
                if ($validator)
                    return $validator;
                if (Hash::check($request->post("password"),$user->password)) {
                    return response()->json([
                        "status" => false,
                        "msg" => "Mật khẩu cũ không khớp!"
                    ], 400);
                }
            }
            $user->password = Hash::make($request->post("new_password"));
            $user->generation_password = 0;
            $user->save();
            return response()->json([
                "status" => true,
                "msg" => "Đổi mật khẩu thành công"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Access denied!!"
            ], 403);
        }
    }
    public function rules(Request $request)
    {
        $rules = [
            'password' => "required",
            'new_password' => "required|confirmed",
            'new_password_confirmation' => "required"
        ];
        $messages = [
            'required' => ':attribute không được để trống',
            'min' => ':attribute ít nhất :min ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp',
        ];
        $attributes = [
            "password" => "Mật khẩu cũ",
            "new_password" => "Mật khẩu mới",
            "new_password_confirmation" => "Xác nhận mật khẩu mới"
        ];
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);
        $errors = $validator->errors();
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "msg" => $errors->first()
            ]);
        }
    }
    public function rules_(Request $request)
    {
        $rules = [
            'new_password' => "required|confirmed",
            'new_password_confirmation' => "required"
        ];
        $messages = [
            'required' => ':attribute không được để trống',
            'min' => ':attribute ít nhất :min ký tự',
            'new_password.confirmed' => 'Xác nhận mật khẩu mới không khớp',
        ];
        $attributes = [
            "new_password" => "Mật khẩu mới",
            "new_password_confirmation" => "Xác nhận mật khẩu mới"
        ];
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);
        $errors = $validator->errors();
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "msg" => $errors->first()
            ]);
        }
    }
}
