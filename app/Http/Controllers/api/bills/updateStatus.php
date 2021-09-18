<?php

namespace App\Http\Controllers\api\bills;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;

class updateStatus extends Controller
{
    public function __construct()
    {
        $this->middleware("isAdmin");
    }
    public function update(Request $request)
    {
        $id = $request->get("id");
        $status = $request->get("status");
        if ($id && $status) {
            $bill = Bill::find($id);
            $bill->status = $status;
            $bill->save();
            return response()->json([
                "status" => true,
                "msg"   => "Cập nhật thành công!"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Missing parameter"
            ], 404);
        }
    }
}
