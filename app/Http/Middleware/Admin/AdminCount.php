<?php

namespace App\Http\Middleware\Admin;

use App\User as Admin;
use Closure;

class AdminCount
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
        $userCount = Admin::where('role', 1)->count();

        if($userCount > 0) {
            return abort(401);
        }

        return $next($request);
    }
}
