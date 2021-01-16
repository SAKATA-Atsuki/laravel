<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // 元々
        // if (Auth::guard($guard)->check()) {
        //     return redirect()->route('top');
        // }

        // 変更
        if (Auth::guard($guard)->check() && $guard === 'member') {
            return redirect()->route('top');
        } else if (Auth::guard($guard)->check() && $guard === 'administer') {
            return redirect()->route('admin');
        }

        return $next($request);
    }
}
