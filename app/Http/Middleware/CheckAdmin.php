<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        if($role == 1){
          return redirect('/index');
        }else if ($role == 2){
          return redirect('/trainer');
        }
        return $next($request);
    }

}
