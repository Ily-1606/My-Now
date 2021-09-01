<?php

namespace App\Http\Controllers\api\locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class indentify extends Controller
{
    //
    public function indentify(Request $request)
    {
        if ($request->get("lat") && $request->get("long")) {
            $lat = $request->get("lat");
            $long = $request->get("long");
            $curl = new \GuzzleHttp\Client();
            $req = $curl->request('GET', "https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=$lat&longitude=$long&localityLanguage=vi");
            $res = json_decode($req->getBody(), true);
            $localityInfo = $res["localityInfo"]["administrative"];
            $file = Storage::disk('local')->get("/public/province.json");
            $provinces = json_decode($file, true);
            $pronvinceInfo = [];
            foreach($provinces as $province){
                $LocationName = strtolower($res["principalSubdivision"]);
                $provinceName = strtolower($province["province_name"]);
                if($LocationName == $provinceName){
                    $pronvinceInfo = $province;
                    break;
                }
            }
            return response()->json([
                "status" => true,
                "data" => [
                    "province" => $pronvinceInfo,
                    "listInfo" => $localityInfo
                ]
            ]);
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Thiếu dữ liệu truyền vào"
            ], 400);
        }
    }
}
