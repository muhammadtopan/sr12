<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class cek_profile
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
        $vendor_data = DB::table("tb_vendor")->where("user_id",Session::get("user_id"))->first();
        return $vendor_data === null ? redirect()->route("vendor.update.profile") : $next($request);
    }
}
