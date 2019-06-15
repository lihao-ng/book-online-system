<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IfAuth {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type, $guard=null) {
        if(!Auth::guard($guard)->check()) {
            if($type == "admins") {
                return redirect()->route('admin.login.show');
            }else {
                return redirect()->route('customer.login.show');
            }
        }

        return $next($request);
    }
}
