<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $role = $user->user_type;
        return view("admin.app",["role"=>$role]);
    }
}
