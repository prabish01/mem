<?php

namespace App\Http\Middleware;

use Closure;

class AuthKey
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
        $token = $request ->header('app_key');
        if($token!='MEM1234567890'){
            return response()->json(["message"=>"Auth Failed"],401);
        }
        return $next($request);
    }
}
