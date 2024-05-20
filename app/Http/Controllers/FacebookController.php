<?php

namespace App\Http\Controllers;

use App\Models\User; // Ensure you import the User model
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function facebookPage()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended(route('user.page'));
            } else {
                $newUser = User::updateOrCreate(
                    ['email' => $user->email],
                    [
                        'name' => $user->name,
                        'facebook_id' => $user->id,
                        // You can add other fields if needed
                    ]
                );

                Auth::login($newUser);
                return redirect()->intended(route('user.page'));
            }

        } catch (Exception $e) {
            // Log the exception message or handle it as needed
            return redirect()->route('user.login')->withErrors(['login_error' => $e->getMessage()]);
        }
    }
}
