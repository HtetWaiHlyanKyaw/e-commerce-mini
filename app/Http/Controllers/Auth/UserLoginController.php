<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Make sure to import the User model

class UserLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.user_login');
    }

    public function login(Request $request)
    {
        // Validate the credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the user by email
        $user = User::where('email', $credentials['email'])->first();

        // Check if the user exists and if the password is null
        if ($user && is_null($user->password)) {
            // Redirect back to login form with an error message
            return redirect()->route('user.login')->withErrors([
                'email' => 'Incorrect Credentials',
            ]);
        }

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('user.page');
        }

        // If authentication failed
        return redirect()->route('user.login')->withErrors([
            'email' => 'IIncorrect Credentials',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
