<?php

namespace App\Http\Controllers\api\locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class get extends Controller
{
    public function get(Request $request)
    {
        $file = Storage::disk('local')->get("/public/province.json");
        if ($file) {
            $provinces = json_decode($file, true);
            return response()->json([
                "result" => true,
                "data" => $provinces
            ]);
        } else {
            return response()->json([
                "result" => false,
                "msg" => "File không tồn tại!"
            ], 404);
        }
    }
    public static function getLocationFromID($id)
    {
        $file = Storage::disk('local')->get("/public/province.json");
        if ($file) {
            $provinces = json_decode($file, true);
            foreach($provinces as $province){
                if($province["province_id"] == $id){
                    return $province;
                    break;
                }
            }
        }
        return false;
    }
}
