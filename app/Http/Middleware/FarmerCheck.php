<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FarmerCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if the user not login as the farmer
        if(!auth()->check() || auth()->user()->role!== 'Farmer'){
            abort('403');
        }
            // if the user login as farmer, continue the request
             return $next($request);
    }
}
