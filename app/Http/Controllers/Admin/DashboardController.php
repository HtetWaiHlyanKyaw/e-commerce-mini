<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        // $userId = session('user_id');
        $user = Auth::user();
        return view('admin.dashboard',['user' => $user]);
    }
}
