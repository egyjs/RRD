<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        if (Auth::check()):
            $userType = Auth::user()->role;
            if (in_array($userType,$request->UserType)):
                return $next($request);
            else:
                return redirect(route('notAllowed'));
            endif;
        else:
            return redirect('/login');
        endif;
    }
}
