<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WakilDirektur2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session()->get('role') === 'Wakil Direktur 2') {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
