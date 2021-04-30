<?php

namespace App\Http\Middleware;

use Closure;

class VendorDashboard
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
        if(session()->has('token_vendor'))
        {
            return $next($request);
        }
        else
        {
            return redirect("vendor")->with("pesan", "Anda Belum Login");
        }
    }
}
