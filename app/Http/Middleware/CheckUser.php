<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
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
    $role = $request->user()->getRole();
    if($role == 2){
      return redirect('/trainer');
    }else if ($role == 3){
      return redirect('/admin');
    }
    return $next($request);
  }
}
