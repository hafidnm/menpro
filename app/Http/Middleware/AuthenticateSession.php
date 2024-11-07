<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthenticateSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::get('login')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
