<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index($id){

        $user = User::findOrFail($id);

         return view('admin.profile', ['user' => $user]);
        // UserController.php



    }






}
