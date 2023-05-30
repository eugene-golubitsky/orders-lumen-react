<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
class AuthMiddleware
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
        $token = $request->bearerToken();
        if(!$token) {
            return response()->json('No token provided', 401);
        }

        $user = DB::table('users')
            ->where('remember_token', '=', $token)
            ->get();
        if(!count($user) || !$user[0]->id) {
            return response()->json('Invalid token', 401);
        }
        return $next($request);
    }

}
