<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class checkAdmin
{


    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

             return $next($request);
           // return redirect(RouteServiceProvider::HOME);
        }

            return  redirect(url_dash('login'));

    }
}




