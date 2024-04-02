<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if(Auth::user()->usertype != 'admin'){
    //         abort(404);
    //     }
    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next, ...$types): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
            // } else {
            //     // Get the authenticated user
            //     $user = Auth::user();

            //     // // Check if the user's type is not in the provided types
            //     if (!in_array($user->usertype, $types)) {

            //  }
            // }

            // Allow the request to pass through to the next middleware or controller

        }
        return $next($request);
    }
}
