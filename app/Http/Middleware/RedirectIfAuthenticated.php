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
        if (Auth::guard()->check()) {
            if (Auth::user()->type_account == 'administrator') {
                return redirect()->route('dashboard')->with(['flash' => 'Selamat Datang Kembali']);
            } elseif (Auth::user()->type_account == 'ppdb') {
                return redirect()->route('ppdb.dashboard')->with(['flash' => 'Selamat Datang Kembali']);
            }
        }
        return $next($request);
    }
}
