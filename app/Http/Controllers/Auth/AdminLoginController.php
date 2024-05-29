<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminLoginController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         // Check if the user is an admin
    //         if (Auth::user()->usertype === 'customer') {
    //             Auth::logout();
    //             return redirect()->route('login');
    //         }
    //         // Authentication passed...
    //         return redirect()->route('dashboard');
    //     }
    //     else{
    //         return redirect()->route('login');
    //     }
    // }

    public function login(Request $request)
    {
        // Validate the credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the admin user by email
        $admin = User::where('email', $credentials['email'])->first();

        // Check if the admin user exists and if the password is null
        if ($admin && is_null($admin->password)) {
            // Redirect back to admin login form with an error message
            return redirect()->route('login')->withErrors([
                'email' => 'Incorrect Credentials.',
            ]);;
        }

        // Attempt to log the admin user in
        if (Auth::attempt($credentials)) {
            // Check if the user is an admin
            if (Auth::user()->usertype === 'customer') {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'email' => 'Please log in with an admin account.',
                ]);
            }
            // Authentication passed...
            return redirect()->route('dashboard');
        } else {
            // If authentication failed
            return redirect()->route('login')->withErrors([
                'email' => 'Incorrect Credentials.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
