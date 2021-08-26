<?php

namespace App\Http\Middleware;

use Closure;

class AfterLogin
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
        if (session()->has('token')) {
            return $next($request);
        } else {
            return redirect("login")->with("pesan", "Anda Belum Login");
        }
    }
}
