<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
$list_apis = [
    array(
        "path" => '/facebook/auth',
        "classes" => [\App\Http\Controllers\api\auth\facebookController::class, 'auth'],
        "name" => 'facebook_auth',
        "method" => "get"
    ),
    array(
        "path" => '/logout',
        "classes" => [\App\Http\Controllers\api\auth\logout::class, 'logout'],
        "name" => 'logout',
        "method" => "get"
    ),
    array(
        "path" => '/regsister',
        "classes" => [\App\Http\Controllers\api\auth\regsister::class, 'regsister'],
        "name" => 'regsister',
        "method" => "post"
    ),
    array(
        "path" => '/login',
        "classes" => [\App\Http\Controllers\api\auth\login::class, 'login'],
        "name" => 'login',
        "method" => "post"
    ),
    array(
        "path" => '/user/info',
        "classes" => [\App\Http\Controllers\api\user\info::class, 'info'],
        "name" => 'user_info',
        "method" => "get"
    ),
    array(
        "path" => '/user/Fullinfo',
        "classes" => [\App\Http\Controllers\api\user\fullInfo::class, 'fullInfo'],
        "name" => 'user_fullinfo',
        "method" => "get"
    ),
    array(
        "path" => '/user/update',
        "classes" => [\App\Http\Controllers\api\user\update::class, 'update'],
        "name" => 'update_user',
        "method" => "put"
    ),
    array(
        "path" => '/user/updateCoord',
        "classes" => [\App\Http\Controllers\api\user\update::class, 'updateCoord'],
        "name" => 'updateCoord_user',
        "method" => "put"
    ),
    array(
        "path" => '/locations/get',
        "classes" => [\App\Http\Controllers\api\locations\get::class, 'get'],
        "name" => 'get_locations',
        "method" => "get"
    ),
    array(
        "path" => '/locations/getNear',
        "classes" => [\App\Http\Controllers\api\locations\countNear::class, 'count'],
        "name" => 'get_locations_near',
        "method" => "get"
    ),
    array(
        "path" => '/locations/indentify',
        "classes" => [\App\Http\Controllers\api\locations\indentify::class, 'indentify'],
        "name" => 'indentify_locations',
        "method" => "get"
    ),
    array(
        "path" => '/posts/list',
        "classes" => [\App\Http\Controllers\api\posts\show::class, 'show'],
        "name" => 'show_post',
        "method" => "get"
    ),
    array(
        "path" => '/posts/info',
        "classes" => [\App\Http\Controllers\api\posts\info::class, 'info'],
        "name" => 'info_post',
        "method" => "get"
    ),
    array(
        "path" => '/user/show',
        "classes" => [\App\Http\Controllers\api\user\show::class, 'show'],
        "name" => 'show_user',
        "method" => "get"
    ),
    array(
        "path" => '/posts/edit',
        "classes" => [\App\Http\Controllers\api\posts\edit::class, 'edit'],
        "name" => 'edit_post',
        "method" => "post"
    ), array(
        "path" => '/posts/CostShip',
        "classes" => [\App\Http\Controllers\api\posts\CostShip::class, 'cost'],
        "name" => 'CostShip',
        "method" => "get"
    ),
    array(
        "path" => '/posts/updateStatus',
        "classes" => [\App\Http\Controllers\api\posts\updateStatus::class, 'update'],
        "name" => 'updateStatus_post',
        "method" => "put"
    ),
    array(
        "path" => '/user/updateStatus',
        "classes" => [\App\Http\Controllers\api\user\updateStatus::class, 'update'],
        "name" => 'updateStatus_user',
        "method" => "put"
    ),
    array(
        "path" => '/user/updatePassword',
        "classes" => [\App\Http\Controllers\api\user\updatePassword::class, 'update'],
        "name" => 'updatePassword',
        "method" => "put"
    ),
    array(
        "path" => '/user/updateAvatar',
        "classes" => [\App\Http\Controllers\api\upload\avatar::class, 'upload'],
        "name" => 'updateAvatar',
        "method" => "post"
    ),
    array(
        "path" => '/user/delete',
        "classes" => [\App\Http\Controllers\api\user\delete::class, 'delete'],
        "name" => 'delete_user',
        "method" => "delete"
    ),
    array(
        "path" => '/posts/delete',
        "classes" => [\App\Http\Controllers\api\posts\delete::class, 'delete'],
        "name" => 'delete_post',
        "method" => "delete"
    ),
    array(
        "path" => '/posts/create',
        "classes" => [\App\Http\Controllers\api\posts\create::class, 'create'],
        "name" => 'create_post',
        "method" => "post"
    ),
    array(
        "path" => "upload/product_images",
        "classes" => [\App\Http\Controllers\api\upload\image::class, 'upload'],
        "name" => "upload_image",
        "method" => "post"
    ),
    array(
        "path" => "cart/remember",
        "classes" => [\App\Http\Controllers\api\cart\remember::class, 'set'],
        "name" => "set_cart",
        "method" => "get"
    ),
    array(
        "path" => "cart/remember/get",
        "classes" => [\App\Http\Controllers\api\cart\remember::class, 'get'],
        "name" => "get_cart",
        "method" => "get"
    ),
    array(
        "path" => "cart/remember/remove",
        "classes" => [\App\Http\Controllers\api\cart\remember::class, 'remove'],
        "name" => "delete_cart",
        "method" => "delete"
    ),
    array(
        "path" => "bills",
        "classes" => [\App\Http\Controllers\api\bills\create::class, 'create'],
        "name" => "create_bill",
        "method" => "post"
    ),
    array(
        "path" => "bills",
        "classes" => [\App\Http\Controllers\api\bills\show::class, 'show'],
        "name" => "show_bill",
        "method" => "get"
    ),
    array(
        "path" => "search",
        "classes" => [\App\Http\Controllers\api\search\search::class, 'search'],
        "name" => "search",
        "method" => "get"
    ),
    array(
        "path" => "categorys/list",
        "classes" => [\App\Http\Controllers\api\categorys\show::class, 'list'],
        "name" => "list_categorys",
        "method" => "get"
    ),
    array(
        "path" => "categorys/create",
        "classes" => [\App\Http\Controllers\api\categorys\create::class, 'create'],
        "name" => "create_categorys",
        "method" => "post"
    ),
    array(
        "path" => "categorys/delete",
        "classes" => [\App\Http\Controllers\api\categorys\delete::class, 'delete'],
        "name" => "delete_categorys",
        "method" => "delete"
    ),
    array(
        "path" => "search/categorys",
        "classes" => [\App\Http\Controllers\api\search\categorys::class, 'search'],
        "name" => "search_categorys",
        "method" => "get"
    )
];
foreach ($list_apis as $api) {
    if ($api["method"] == "get")
        Route::get($api["path"], $api["classes"])->name($api["name"]);
    else if ($api["method"] == "post")
        Route::post($api["path"], $api["classes"])->name($api["name"]);
    else if ($api["method"] == "put")
        Route::put($api["path"], $api["classes"])->name($api["name"]);
    else if ($api["method"] == "delete")
        Route::delete($api["path"], $api["classes"])->name($api["name"]);
}
