<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DeliveryboyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
       if (Auth::check() && Auth::user()->role == 'delivery_boy') {
            return $next($request);
        }
        
        return redirect()->route('login')->with('error', 'Access denied. DeliveryBoy access required.');
    }
}
