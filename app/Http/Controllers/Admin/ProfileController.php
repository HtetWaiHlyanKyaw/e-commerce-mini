<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        // Pass user data to the view
        return view('admin.profile', ['user' => $user]);
    }






}
