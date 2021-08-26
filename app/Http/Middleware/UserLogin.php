<?php

namespace App\Http\Middleware;

use Closure;

class UserLogin
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
        return session()->has('tokenUser') ? $next($request) : redirect()->route("user.login")->with("pesan", "Anda Belum Login");
    }
}
