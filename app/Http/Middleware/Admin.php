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
        }
        $user = Auth::user();
        if (!in_array($user->usertype, $types)) {
            // Redirect to the dashboard or any other appropriate route
            // return redirect()->route('dashboard');
            abort('403');

        }
        return $next($request);
    }
}
