<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$routes = [
    [
        'name' => "home",
        "path" => "/"
    ], [
        'name' => "login",
        "path" => "/login"
    ], [
        'name' => "regsister",
        "path" => "/regsister"
    ], [
        'name' => "profile",
        "path" => "/profile"
    ], [
        'name' => "profileAny",
        "path" => "/profile/{any}"
    ], [
        'name' => "product",
        "path" => "/product/{any}"
    ], [
        'name' => "cart_info",
        "path" => "/cart"
    ], [
        'name' => "search",
        "path" => "/search/{any}"
    ]
];
foreach ($routes as $route) {
    Route::get($route["path"], [\App\Http\Controllers\HomeController::class, 'index'])->name($route["name"]);
}
Route::get('/admin/{any}', [\App\Http\Controllers\admin\Admin::class, 'index'])->name('admin/index')->middleware('isAdmin');
Route::get('/admin', [\App\Http\Controllers\admin\Admin::class, 'index'])->name('admin/index')->middleware('isAdmin');
