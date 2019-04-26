<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuth {
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next, $guard = null){
    if(current_user()->isAdmin()) {
      return $next($request);
    }
    
    return abort(401);
  }
}
