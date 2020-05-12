<?php

namespace App\Http\Middleware;
use App;
use Closure;
use Session;
class Language
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
         if(session()->has('locale')){
           app()->setLocale(session()->get('locale'));
         }
         return $next($request);
     }
}
