<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check if the user is role is admin
        if (auth()->user()->role != 'admin') {
            return redirect()->route('home')->with('error', 'You are not authorized to access this page.');
        } else {
            return $next($request);
        }
    }
}
