<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Enumeration\RoleType;

class CompanyUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $requiredRole = null )
    {
        if( $requiredRole == null )
            $requiredRole = 'staff';

        if (Auth::check()) {
            if( $requiredRole=='staff' && Auth::user()->role == RoleType::$COMPANY_STAFF )
                return $next($request);
            if( Auth::user()->role == RoleType::$COMPANY_ADMIN )
                return $next($request);
            if( Auth::user()->role == RoleType::$ADMIN )
                return $next($request);
        }
        abort('401', 'unauthorized');
    }
}