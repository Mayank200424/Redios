<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            }elseif($user->role === 'customer'){
                return redirect()->route('customer.index');
            }elseif($user->role === 'vendor'){
                return redirect()->route('vendor.index');
            }elseif ( $user->role == 'delivery_boy' ) {
                return redirect()->route( 'deliveryboy.index');
            }else{
                return redirect('/');
            }
        }

        return $next($request);
    }
}
