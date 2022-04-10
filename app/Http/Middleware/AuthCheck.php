<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        // Check if user isnt logged in and redirect to login page
        if(!session()->has('LoggedUser') && $request->path() != 'auth/login' && $request->path() != 'auth/register'){
            return redirect('auth/login')->with('error','You must login first.');
        }
        // check if user is logged in not allow to go to register and login
        if(session()->has('LoggedUser') && $request->path() == 'auth/login' || $request->path() == 'auth/register'){
            return back();
        }
        // cache control
        return $next($request)->header('Cache-Control', 'no-store, no-cache, max-age-0, must-revalidate')
                              ->header('Pragma', 'no-cache')
                              ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
    }
}
