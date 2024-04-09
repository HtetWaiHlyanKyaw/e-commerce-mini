<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        // Pass user data to the view
        return view('user.profile', ['user' => $user]);
    }
}
