<?php

namespace App\Http\Middleware;

use Closure;

class CheckForCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->type == 'Customer')
            return $next($request);
        else{
            return response()->json([
                'error' =>  'You are not authorised for this action'
            ]);
        }

    }
}
