<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        // Specify the redirect URL in the redirect() function
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            // Check if the user already exists based on the Google ID
            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                // If the user doesn't exist, check if the email address is already registered
                $existingUser = User::where('email', $google_user->getEmail())->first();

                if ($existingUser) {
                    // If a user with the same email exists, log in that user
                    Auth::login($existingUser);
                } else {
                    // Otherwise, create a new user
                    $new_user = User::create([
                        'name' => $google_user->getName(),
                        'email' => $google_user->getEmail(),
                        'google_id' => $google_user->getId(),
                    ]);
                    Auth::login($new_user);
                }
            } else {
                // If the user already exists, log in that user
                Auth::login($user);
            }

            // Redirect to the desired route
            return redirect()->intended('shop'); // Make sure 'shop' is a valid route
        } catch (\Throwable $th) {
            // Handle exceptions
            dd('Something went wrong!' . $th->getMessage());
        }
    }
}
