<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateViaIP
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
        // Create a user record based on the IP address of the request.
        $user = \App\Models\User::firstOrCreate([
            'ip_address' => $request->ip()
        ]);

        if (! \Auth::user()) {
            \Auth::login($user);
        }

        return $next($request);
    }
}
