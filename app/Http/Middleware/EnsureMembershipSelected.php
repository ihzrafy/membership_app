<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureMembershipSelected
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->membership_type === null) {
            // Allow access to the selection page and the update action to prevent infinite loop
            if ($request->routeIs('membership.select') || $request->routeIs('membership.update') || $request->routeIs('logout')) {
                return $next($request);
            }
            
            return redirect()->route('membership.select');
        }

        return $next($request);
    }
}
