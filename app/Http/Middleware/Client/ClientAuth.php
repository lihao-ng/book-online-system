<?php

namespace App\Http\Middleware\Client;

use Closure;

class ClientAuth {
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next, $guard = null){
    if(current_user()->isCustomer()) {
      return $next($request);
    }
    
    return abort(401);
  }
}
