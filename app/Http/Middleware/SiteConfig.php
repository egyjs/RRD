<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Schema;

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
        if(!Schema::hasTable('users')){
            abort('413','Site Config File Not Found, run code: <code>php artisan mksite</code>');
        } else{
            return $next($request);
        }
    }
}
