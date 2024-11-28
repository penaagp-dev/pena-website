<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    // public function handle(Request $request, Closure $next, $role)
    // {
    //     if (Auth::check()) {
    //         $user = Auth::user();
    //         if ($user->role === $role || $role === 'superadmin') {
    //             return $next($request);
    //         }
    //     }

    //     return response()->json(['error' => 'Unauthorized'], 403);
    // }

    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }
        
        return redirect('/cms/admin/login')->with('error', 'You do not have access to this page.');
    }
}