<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FilterFreelance
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
        $user = DB::table("tb_user")->where("user_id", Session::get("auth")->user_id)->first();
        if($user->user_status === "off") {
            return redirect()->route("freelance.profile");
        }
        return $next($request);
    }
}
