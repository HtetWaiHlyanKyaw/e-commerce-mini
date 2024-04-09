<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();

        return view('index', ['user' => $user]);
    }

}
