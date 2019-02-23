<?php

namespace App\Http\Middleware;

use Closure;

class SiteConfig
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
        // put condition here abdo :-)
        if (1>2){
            abort('413','Site Config File Not Found');
        } else{
            return $next($request);
        }
    }
}
