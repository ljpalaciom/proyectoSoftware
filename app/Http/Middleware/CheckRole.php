<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = $request->user();
        if(!$user){
          return redirect('/'); //login
        }
        if (!$user->hasRole($role)) {
            return redirect($user->getBaseUrl());
        }

        return $next($request);

    }

}
