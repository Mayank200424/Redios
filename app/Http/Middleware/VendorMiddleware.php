<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'vendor') {
            return $next($request);
        }
        
        return redirect()->route('login')->with('error', 'Access denied. Vendor access required.');
    }
}
