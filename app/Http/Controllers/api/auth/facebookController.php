<?php

namespace App\Http\Controllers\api\auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class facebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function auth(Request $request)
    {
        if ($request->input("access_token")) {
            $access_token = $request->input('access_token');
            $curl = new \GuzzleHttp\Client();
            try {
                $req = $curl->request('GET', "https://graph.facebook.com/v11.0/me?fields=id%2Cname%2Cemail&access_token=$access_token");
                $res = json_decode($req->getBody(), true);
                $email = $res["email"];
                if ($email) {
                    $user = User::where("email", $email)->first();
                    if ($user) {
                        Auth::login($user, true);
                        return response()->json([
                            "status" => true,
                            "image" => $user->avatar,
                            "fullname" => $user->name
                        ]);
                    } else {
                        $user = User::create([
                            'email' => $email,
                            'name' => $res["name"],
                            'password' => Hash::make(getdate()[0]),
                            "generation_password" => true
                        ]);
                        if ($user) {
                            Auth::login($user, true);
                            return response()->json([
                                "status" => true,
                                "image" => $user->avatar,
                                "fullname" => $user->name
                            ]);
                        }
                    }
                } else {
                    return response()->json(
                        [
                            "status" => false,
                            "msg" => "Tài khoản facebook của bạn không có địa chỉ email!"
                        ],
                        403
                    );
                }
            } catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    "msg" => "Something went wrong!"
                ], 400);
            }
        }
    }
}
