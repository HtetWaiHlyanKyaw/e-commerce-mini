<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/admin/login');
    }


    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // public function handleProviderCallback(Request $request, $provider)
    // {
    //     $user = Socialite::driver($provider)->user();

    //     // Your authentication logic here
    // }


    public function handleProviderCallback(Request $request, $provider)
{
    $oauthUser = Socialite::driver($provider)->user();

    // Check if user exists in your system based on the OAuth provider's unique identifier
    $user = User::where('provider_id', $oauthUser->id)->where('provider', $provider)->first();

    if (!$user) {
        // User doesn't exist, create a new user account
        $user = new User();
        $user->name = $oauthUser->name;
        $user->email = $oauthUser->email;
        $user->provider = $provider;
        $user->provider_id = $oauthUser->id;
        $user->save();
    }

    // Log in the user
    Auth::login($user);

    // Redirect to a dashboard or any other page
    return redirect('/dashboard');
}
}
