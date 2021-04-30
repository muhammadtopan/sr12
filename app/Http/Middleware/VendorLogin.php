<?php

namespace App\Http\Middleware;

use Closure;

class VendorLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session()->has('token_vendor')) 
        {
            return $next($request);
        } 
        else 
        {
            return redirect()
                    ->route('vendor.dashboard')
                    ->with('pesan', 'Selamat Datang!!!');
        }
    }
}
