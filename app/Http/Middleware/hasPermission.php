<?php

namespace App\Http\Middleware;

use App\User;
use Auth;
use Closure;

class hasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $str_module)
    {
        return (User::hasPermission($str_module, Auth::user()->role_id)) ? $next($request) : redirect()->route('home')->with('message', "You don't have permission to that module.");
    }
}
