<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        if(in_array($request->user()->role, $role)) {
            return $next($request);
        }
        return redirect('/cms/admin');
    }
}