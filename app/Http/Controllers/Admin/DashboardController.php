<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $userId = session('user_id');
        return view('admin.dashboard',['userId' => $userId]);
    }





}
