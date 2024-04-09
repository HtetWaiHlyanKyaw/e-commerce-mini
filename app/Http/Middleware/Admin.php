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
    public function handle(Request $request, Closure $next, ...$types): Response
    {
        if (!Auth::check()) {
            return redirect('/admin/login');
        }
        $user = Auth::user();
        if ($user->usertype === 'customer') {
            return redirect('/admin/login');
        }
        if (!in_array($user->usertype, $types)) {
            abort('403');
        }
        return $next($request);
    }
}
