<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($guard == "consultor" && Auth::guard($guard)->check()) {
            return redirect('consultor');
        }
        if ($guard == "pescador" && Auth::guard($guard)->check()) {
            return redirect('pescador');
        }
        if ($guard == "buyer" && Auth::guard($guard)->check()) {
            return redirect('store-index');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/admin/home');
        }

        return $next($request);
    }
}
