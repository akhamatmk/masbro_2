<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenticateBackend
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */

    public function handle($request, Closure $next)
    {
        if (Auth::user() == null) {
            Auth::logout();
            return redirect('backend/admin/login');
        }

        if(Auth::user() != null)
        {
            if(Auth::user()->type == 0)
            {
                Auth::logout();
                return redirect('backend/admin/login');
            }
        }

        return $next($request);
    }
}
